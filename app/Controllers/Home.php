<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
    //     if(session()->get('id')==0 ) {
    //         $num1 = rand(1, 10);
    //         $num2 = rand(1, 10);
    //         echo view('login', ['num1' => $num1, 'num2' => $num2]);

    //     }else{
    //         return redirect()->to('/home/dashboard');
    // }

        if(session()->get('level')!= null) {
        $previousURL = previous_url(); // Get the URL of the previous page
        
        if ($previousURL) {
            return redirect()->to($previousURL); // Redirect to the previous page
        }

    }else{

        $model=new M_model();
        $where=array('dipakai'=>'Y');
        
        $cekSekolah=$model->getRow('settings_website',$where);
        session()->set('foto_sekolah',$cekSekolah->foto);
        session()->set('text_sekolah',$cekSekolah->text);
        session()->set('login_sekolah',$cekSekolah->login);
        session()->set('nama_website',$cekSekolah->nama_website);

        echo view('kasir/view/login');
    }
}

public function aksi_login()
{
    $n=$this->request->getPost('username'); 
    $p=$this->request->getPost('password');

    $captchaResponse = $this->request->getPost('g-recaptcha-response');
    $captchaSecretKey = '6Le4D6snAAAAAHD3_8OPnw4teaKXWZdefSyXn4H3';

    $verifyCaptchaResponse = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret={$captchaSecretKey}&response={$captchaResponse}"
    );

    $captchaData = json_decode($verifyCaptchaResponse);

    if (!$captchaData->success) {

        session()->setFlashdata('error', 'CAPTCHA verification failed. Please try again.');
        return redirect()->to('/Home');
    }

    $model= new M_model();
    $data=array(
        'username'=>$n, 
        'password'=>md5($p)
    );
    $cek=$model->getarray('user', $data);
    if ($cek>0) {
        $where=array('id_user_pengguna'=>$cek['id_user']);
        $pengguna=$model->getarray('pengguna', $where);
        session()->set('id', $cek['id_user']);
        session()->set('username', $cek['username']);
        session()->set('nama_pengguna', $pengguna['nama_pengguna']);
        session()->set('level', $cek['level']);

        $id = session()->get('id');
        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Login Pada Sistem Dengan Akun ID ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/dashboard');

    }else {
        return redirect()->to('/');
    }
}

public function log_out()
{
    if(session()->get('id')>0) {
        $model = new M_model();
        $id = session()->get('id');

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Logout Dari Sistem Dengan Akun ID ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        session()->destroy();
        return redirect()->to('/');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function dashboard()
{
    if(session()->get('id')>0) {

        $model= new M_model();
        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);       

        echo view('header', $kui);
        echo view('menu');
        echo view('dashboard');
        echo view('footer');
    }else{
        return redirect()->to('/');
    }
}

public function settings_control()
{
    if(session()->get('level')== 1) {

        $id=session()->get('id');
        $where=array('id_settings'=> 1);
        $model=new M_model();
        $pakif['use']=$model->getRow('settings_website',$where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header', $kui);
        echo view('menu');
        echo view('settings', $pakif);
        echo view('footer');
    }else {
        return redirect()->to('/');
    }
}

public function aksi_change_website_settings()
{
    $model = new M_model();
    $id = $this->request->getPost('id');
    $where = array('id_settings' => $id);
    
    $logo = array();

    $photo = $this->request->getFile('foto');
    $text = $this->request->getFile('text'); 
    $login = $this->request->getFile('login'); 

    if ($photo && $photo->isValid()) {
        // Proses file foto
        $img = $photo->getRandomName();
        $photo->move(PUBLIC_PATH . '/assets/images/settings_web/', $img);
        $logo['foto'] = $img;
    }

    if ($text && $text->isValid()) {
        // Proses file teks
        $textFileName = $text->getRandomName();
        $text->move(PUBLIC_PATH . '/assets/images/settings_web/', $textFileName);
        $logo['text'] = $textFileName;
    }

    if ($login && $login->isValid()) {
        // Proses file login
        $loginFileName = $login->getRandomName();
        $login->move(PUBLIC_PATH . '/assets/images/settings_web/', $loginFileName);
        $logo['login'] = $loginFileName;
    }

    // Hanya update nama_website jika ada perubahan
    $nama_website = $this->request->getPost('nama_website');
    if (!empty($nama_website)) {
        $logo['nama_website'] = $nama_website;
    }

    // Sekarang, kita periksa apakah $logo memiliki data
    if (!empty($logo)) {
        $model->edit('settings_website', $logo, $where);
    }

    $logo=array(
        'id_user_log'=>session()->get('id'),
        'activity'=>"Mengedit Website ". $nama_website."",
        'tanggal_activity'=>date('Y-m-d H:i:s')
    );
    $model->simpan('log_activity',$logo);

    // Redirect atau tampilkan pesan berhasil sesuai kebutuhan Anda
    return redirect()->to('/home/log_out');
}

public function users()
{
    if(session()->get('level')== 1) {

        $model=new M_model();
        $on='pengguna.maker_pengguna=user.id_user';
        $kui['duar']=$model->fusionOderBy('pengguna', 'user', $on,  'tanggal_pengguna', 30);

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        
        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('users/view/users');
        echo view('footer'); 

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function detail_users($id)
{
    if(session()->get('level')== 1){

        $model=new M_model();
        $where2=array('id_user_pengguna'=>$id); 
        $on='pengguna.id_user_pengguna=user.id_user';
        $kui['gas']=$model->detail('pengguna', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('users/view/detail_users');
        echo view('footer');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function add_users()
{
    if(session()->get('level')== 1) {

        $model=new M_model();
        $on='pengguna.maker_pengguna=user.id_user';
        $kui['duar']=$model->fusionOderBy('pengguna', 'user', $on, 'tanggal_pengguna');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('users/add/add_users');
        echo view('footer');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function aksi_add_users()
{
    $model=new M_model();

    $nama_pengguna=$this->request->getPost('nama_pengguna');
    $email=$this->request->getPost('email');
    $jk=$this->request->getPost('jk');
    $username=$this->request->getPost('username');
    $level=$this->request->getPost('level');
    $maker_pengguna=session()->get('id');
    
    $user=array(
        'username'=>$username,
        'password'=>md5($password),
        'level'=>$level,
    );

    $model=new M_model();
    $model->simpan('user', $user);
    $where=array('username'=>$username);
    $id=$model->getarray('user', $where);
    $iduser = $id['id_user'];

    $pengguna = array(
        'nama_pengguna' => $nama_pengguna,
        'email' => $email,
        'jk' => $jk,
        'id_user_pengguna' => $iduser,
        'maker_pengguna' => $maker_pengguna,
    );

    $model->simpan('pengguna', $pengguna);

    $data=array(
        'id_user_log'=>session()->get('id'),
        'activity'=>"Menambah Akun Pegawai ". $nama_pengguna."",
        'tanggal_activity'=>date('Y-m-d H:i:s')
    );
    $model->simpan('log_activity',$data);

    return redirect()->to('/home/users');
}

public function reset_pw($id)
{
    if(session()->get('level')== 1) {

        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('@dmin123')
        );
        $model->edit('user',$data,$where);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Mereset Password Pada Akun Pegawai Dengan ID ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/users');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function edit_users($id)
{
    if(session()->get('level')== 1) {

        $model=new M_model();
        $where2=array('pengguna.id_user_pengguna'=>$id);

        $on='pengguna.id_user_pengguna=user.id_user';
        $kui['duar']=$model->edit_user('pengguna', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('users/edit/edit_users');
        echo view('footer');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function aksi_edit_users()
{
    $id= $this->request->getPost('id');    
    $username= $this->request->getPost('username');
    $level= $this->request->getPost('level');
    $nama_pengguna= $this->request->getPost('nama_pengguna');
    $email= $this->request->getPost('email');
    $jk= $this->request->getPost('jk');
    $maker_pengguna=session()->get('id');

    $where=array('id_user'=>$id);    
    $where2=array('id_user_pengguna'=>$id);
    if ($password !='') {
        $user=array(
            'username'=>$username,
            'level'=>$level,
        );
    }else{
        $user=array(
            'username'=>$username,
            'level'=>$level,
        );
    }
    
    $model=new M_model();
    $model->edit('user', $user,$where);

    $pengguna=array(
        'nama_pengguna'=>$nama_pengguna,
        'email' => $email,
        'jk'=>$jk,
        'maker_pengguna'=>$maker_pengguna
    );

    $model->edit('pengguna', $pengguna, $where2);

    $data=array(
        'id_user_log'=>session()->get('id'),
        'activity'=>"Mengedit Akun Pegawai ". $nama_pengguna." Dengan ID ". $id."",
        'tanggal_activity'=>date('Y-m-d H:i:s')
    );
    $model->simpan('log_activity',$data);

    return redirect()->to('/home/users');
}

public function delete_users($id)
{
    if(session()->get('level')== 1) {

        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_user_pengguna'=>$id);
        $model->hapus('pengguna',$where);
        $model->hapus('user',$where2);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Menghapus Akun Pegawai Dengan ID ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/users');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function menu()
{
    if(session()->get('level')== 2 || session()->get('level')== 3) {

        $model=new M_model();
        $on='menu.maker_menu=user.id_user';
        $kui['duar']=$model->fusionOderBy('menu', 'user', $on,  'tanggal_menu');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('menu/view/menu_menu');
        echo view('footer'); 

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function add_menu_payment($id)
{
    // if(session()->get('level')== 1){

    $model=new M_model();
    $where2=array('id_menu'=>$id); 
    $on='menu.maker_menu=user.id_user';
    $kui['gas']=$model->detail('menu', 'user',$on, $where2);

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('menu/view/detail_menu');
    echo view('footer');

    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
}

public function add_menu()
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $on='menu.maker_menu=user.id_user';
        $kui['duar']=$model->fusion('menu', 'user', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu',$kui);
        echo view('menu/add/add_menu',$kui);
        echo view('footer');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function aksi_add_menu()
{
    $model=new M_model();
    $nama_menu=$this->request->getPost('nama_menu');
    $deskripsi_menu=$this->request->getPost('deskripsi_menu');
    $harga_menu=$this->request->getPost('harga_menu');
    $maker_menu=session()->get('id');
    $data=array(

        'nama_menu'=>$nama_menu,
        'deskripsi_menu'=>$deskripsi_menu,
        'harga_menu'=>$harga_menu,
        'status'=>'<span style="color: red;">Tidak Tersedia</span>',
        'maker_menu'=>$maker_menu
    );

    try {
        $foto = $this->request->getFile('foto_menu');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(ROOTPATH . '/public/assets/images/menu/', $newName);
            $data['foto_menu'] = $newName; // Add the uploaded file name to the data
        }

        $model->simpan('menu',$data);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Menambah Menu ". $nama_menu."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/menu');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function menu_tersedia($id)
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $where=array('id_menu'=>$id);
        $data=array(
            'status'=>"Menu Tersedia"
        );
        $model->edit('menu', $data, $where);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Status Menu Dengan ID ". $id." Tersedia",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('home/menu');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function tidak_tersedia($id)
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $where=array('id_menu'=>$id);
        $data=array(
            'status'=>'<span style="color: red;">Tidak Tersedia</span>'
        );
        $model->edit('menu', $data, $where);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Status Menu Dengan ID ". $id." Tidak Tersedia",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('home/menu');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function menu_search()
{
   if(!session()->get('id') > 0){
    return redirect()->to('/home/dashboard');
}

if(session()->get('level')== 2 || session()->get('level')== 3) {

    $model=new M_model();
    $on='menu.maker_menu=user.id_user';
    $where=$this->request->getPost('search_menu');
    $kui['duar']=$model->superLike2('menu', 'user', $on, 'menu.nama_menu','menu.harga_menu', $where);
}

$id=session()->get('id');
$where=array('id_user'=>$id);
$kui['search']="on";

$where=array('id_user' => session()->get('id'));
$kui['foto']=$model->getRow('user',$where);

echo view ('header', $kui);
echo view ('menu');
echo view ('menu/view/menu_menu');
echo view ('footer');
}

public function edit_menu($id)
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $where=array('menu.id_menu'=>$id);

        $on='menu.maker_menu=user.id_user';
        $kui['duar']=$model->fusion_Row('menu', 'user', $on, $where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('menu/edit/edit_menu');
        echo view('footer');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function aksi_edit_menu()
{
    $model=new M_model();
    $id=$this->request->getPost('id');
    $nama_menu=$this->request->getPost('nama_menu');
    $deskripsi_menu=$this->request->getPost('deskripsi_menu');
    $harga_menu=$this->request->getPost('harga_menu');
    $maker_menu=session()->get('id');
    $data=array(
        'nama_menu'=>$nama_menu,
        'deskripsi_menu'=>$deskripsi_menu,
        'harga_menu'=>$harga_menu,
        'maker_menu'=>$maker_menu
    );

    try {
        $foto = $this->request->getFile('foto_menu');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(ROOTPATH . '/public/assets/images/menu/', $newName);
            $data['foto_menu'] = $newName; // Add the uploaded file name to the data
        }
    // print_r($data);
        $where=array('id_menu'=>$id);
        $model->edit('menu',$data,$where);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Mengedit Menu ". $nama_menu." Dengan Id ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/menu');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function delete_menu($id)
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $where=array('id_menu'=>$id);
        $model->hapus('menu',$where);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Menghapus Menu Dengan ID ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('home/menu');

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function aksi_add_keranjang_menu()
{
    $model=new M_model();
    $id_menu=$this->request->getPost('id_menu');
    $banyak=$this->request->getPost('banyak');
    $maker_keranjang=session()->get('id');
    $data=array(

        'id_menu_keranjang'=>$id_menu,
        'banyak'=>$banyak,
        'maker_keranjang'=>$maker_keranjang
    );
    $model->simpan('keranjang',$data);

    $data=array(
        'id_user_log'=>session()->get('id'),
        'activity'=>"Menambahkan Menu Ke Keranjang Dengan ID ". $id_menu."",
        'tanggal_activity'=>date('Y-m-d H:i:s')
    );
    $model->simpan('log_activity',$data);

    return redirect()->to('/home/menu');
}

public function profile()
{
    if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

        $id=session()->get('id');
        $where2=array('id_user'=>$id);
        $where=array('id_user_pengguna'=>$id);
        $model=new M_model();
        $pakif['users']=$model->edit_pp('pengguna',$where);
        $pakif['use']=$model->edit_pp('user',$where2);

        $kui['foto']=$model->getRow('user',$where2);

        $id=session()->get('id');


        echo view('header',$kui);
        echo view('menu');
        echo view('kasir/view/profile', $pakif);
        echo view('footer');
    }else {
        return redirect()->to('/');
    }
}

public function aksi_change_profile()
{
        // print_r($this->request->getPost());
    $model= new M_model();
    $id=session()->get('id');
    $where=array('id_user'=>$id);
    $photo=$this->request->getFile('foto');
    $kui=$model->getRow('user',$where);
    if( $photo != '' ){}
        elseif($photo != '' && file_exists(PUBLIC_PATH."/assets/images/profile/".$kui->foto) ) 
        {
            unlink(PUBLIC_PATH."/assets/images/profile/".$kui->foto);
        }
        elseif($photo == '')
        {
            $username= $this->request->getPost('username');
            $email= $this->request->getPost('email');                    
            $nama_pengguna= $this->request->getPost('nama_pengguna');
            $jk= $this->request->getPost('jk');

            $user=array(
                'username'=>$username,
            );
            $model->edit('user', $user,$where);
            $where2=array('id_user_pengguna'=>$id);

            $pengguna=array(
                'email'=>$email,
                'nama_pengguna'=>$nama_pengguna,
                'jk'=>$jk,
            );
            $model->edit('pengguna', $pengguna, $where2);

            $data=array(
                'id_user_log'=>session()->get('id'),
                'activity'=>"Mengedit Profile ". $nama_pengguna."",
                'tanggal_activity'=>date('Y-m-d H:i:s')
            );
            $model->simpan('log_activity',$data);

            return redirect()->to('/home/profile');
        }

        $username= $this->request->getPost('username');
        $email= $this->request->getPost('email');                    
        $nama_pengguna= $this->request->getPost('nama_pengguna');
        $jk= $this->request->getPost('jk');

        $img = $photo->getRandomName();
        $photo->move(PUBLIC_PATH.'/assets/images/profile/',$img);
        $user=array(
            'username'=>$username,
            'foto'=>$img
        );
        $model=new M_model();
        $model->edit('user', $user,$where);

        $pengguna=array(
            'email'=>$email,
            'nama_pengguna'=>$nama_pengguna,
            'jk'=>$jk,
        );
        $where2=array('id_user_pengguna'=>$id);
        $model->edit('pengguna', $pengguna, $where2);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Mengedit Profile ". $nama_pengguna."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/profile');
    }

    public function change_pw()  
    {
        if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

            $id=session()->get('id');
            $where2=array('id_user'=>$id);
            $model=new M_model();
            $where=array('id_user' => session()->get('id'));
            $kui['foto']=$model->getRow('user',$where);
            $pakif['use']=$model->getRow('user',$where2);

            $id=session()->get('id');
            $where=array('id_user'=>$id);

            echo view('header',$kui);
            echo view('menu',$pakif);
            echo view('kasir/view/change_pw',$pakif);
            echo view('footer');
        }else{
            return redirect()->to('/');
        }
    }

    public function aksi_change_pw()   
    {
        $pass=$this->request->getPost('pw');
        $id=session()->get('id');
        $model= new M_model();

        $data=array( 
            'password'=>md5($pass)
        );
        
        $where=array('id_user'=>$id);
        $model->edit('user', $data, $where);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Mengganti Password Dengan ID ". $id."",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        return redirect()->to('/home/log_out');
    }

    public function log_activity()
    {
        if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

            $model=new M_model();
            $where=array('log_activity.id_user_log'=>session()->get('id'));
            $on='log_activity.id_user_log=user.id_user';
            $kui['duar'] = $model->log('log_activity', 'user', $on, $where, 'tanggal_activity');

            $id=session()->get('id');
            $where=array('id_user'=>$id);

            $where=array('id_user' => session()->get('id'));
            $kui['foto']=$model->getRow('user',$where);

            echo view ('header', $kui);
            echo view ('menu');
            echo view ('log_activity/log');
            echo view ('footer');

        }else{
            return redirect()->to('/home/dashboard');
        }
    }

    public function employee_activity()
    {
    // Cek jika tingkat akses adalah 1, 2, atau 3
        $userLevel = session()->get('level');
        if ($userLevel == 1 || $userLevel == 2 || $userLevel == 3) {
            $model = new M_model();
            $where = [];

        // Jika tingkat akses adalah 2 atau 3, tambahkan kondisi ke $where
            if ($userLevel == 2 && $userLevel == 3) {
                $where['log_activity.id_user_log'] = session()->get('id');
            }

            $on = 'log_activity.id_user_log=user.id_user';
            $kui['duar'] = $model->log('log_activity', 'user', $on, $where, 'tanggal_activity');

            $id = session()->get('id');
            $where = ['id_user' => $id];

            $where = ['id_user' => session()->get('id')];
            $kui['foto'] = $model->getRow('user', $where);

            echo view('header', $kui);
            echo view('menu');
            echo view('log_activity/employee_activity');
            echo view('footer');
        } else {
            return redirect()->to('/home/dashboard');
        }
    }

    public function log_search()
    {
        if (!session()->get('id') > 0) {
            return redirect()->to('/home/dashboard');
        }

        $model = new M_model();

    $search_log = $this->request->getPost('search_log'); // Ambil input dari search bar

    if (session()->get('level') == 1 || session()->get('level') == 2 && !empty($search_log)) {
        $on = 'log_activity.id_user_log=user.id_user';
        $kui['duar'] = $model->search_log('log_activity', 'user', $on, 'user.username', $search_log);
    }

    $id = session()->get('id');
    $where = ['id_user' => $id];
    $kui['search'] = "on";

    $where = ['id_user' => session()->get('id')];
    $kui['foto'] = $model->getRow('user', $where);

    echo view('header', $kui);
    echo view('menu');
    echo view('log_activity/employee_activity');
    echo view('footer');
}

public function menu_card()
{
   if(!session()->get('id') > 0){
    return redirect()->to('/home/dashboard');
}

if(session()->get('level')== 3) {

    $model=new M_model();
    $where=array('keranjang.maker_keranjang'=>session()->get('id'));
    $on='keranjang.id_menu_keranjang=menu.id_menu';
    $on2='keranjang.maker_keranjang=user.id_user';
    $kui['duar']=$model->superDataDouble('keranjang', 'menu', 'user', $on, $on2, 'tanggal_keranjang', $where);
}

$id=session()->get('id');
$where=array('id_user'=>$id);

$where=array('id_user' => session()->get('id'));
$kui['foto']=$model->getRow('user',$where);

echo view('header',$kui);
echo view('menu');
echo view('keranjang/view/keranjang');
echo view('footer'); 
}

public function delete_keranjang()
{
    if (session()->get('level') == 3) {
        $ids = $this->request->getPost('keranjang');

        // Check if $ids is an array
        if (is_array($ids)) {
            $model = new M_model();

            foreach ($ids as $id) {
                $where = array('id_keranjang' => $id);
                $model->hapus('keranjang', $where);
            }
            $data=array(
                'id_user_log'=>session()->get('id'),
                'activity'=>"Menghapus Menu Dari Keranjang Dengan ID ". $id."",
                'tanggal_activity'=>date('Y-m-d H:i:s')
            );
            $model->simpan('log_activity',$data);

            return redirect()->to('home/menu_card');
        } else {
            return redirect()->to('home/menu_card')->with('error', 'Invalid input data');
        }
    } else {
        return redirect()->to('/home/dashboard');
    }
}

public function transaction()
{
   if(!session()->get('id') > 0){
    return redirect()->to('/home/dashboard');
}

if(session()->get('level')== 3) {

    $model=new M_model();
    $where=array('transaksi.maker_transaksi '=>session()->get('id'));
    $on='transaksi.maker_transaksi=user.id_user';
    $kui['duar']=$model->fusionDataDouble('transaksi', 'user', $on, 'tanggal_transaksi', $where);
}

$id=session()->get('id');
$where=array('id_user'=>$id);

$where=array('id_user' => session()->get('id'));
$kui['foto']=$model->getRow('user',$where);

echo view('header',$kui);
echo view('menu');
echo view('transaksi/view/transaksi');
echo view('footer'); 
}

public function transaksi_search()
{
   if(!session()->get('id') > 0){
    return redirect()->to('/home/dashboard');
}

if(session()->get('level')== 3) {

    $model=new M_model();
    $on='transaksi.maker_transaksi=user.id_user';
    $where=$this->request->getPost('search_transaksi');
    $kui['duar']=$model->superLike2('transaksi', 'user', $on, 'transaksi.no_meja','transaksi.dengan', $where);
}

$id=session()->get('id');
$where=array('id_user'=>$id);
$kui['search']="on";

$where=array('id_user' => session()->get('id'));
$kui['foto']=$model->getRow('user',$where);

echo view ('header', $kui);
echo view ('menu');
echo view ('transaksi/view/transaksi');
echo view ('footer');
}

public function transaction_m()
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $on='transaksi.maker_transaksi=user.id_user';
        $kui['duar']=$model->fusionOderBy('transaksi', 'user', $on, 'tanggal_transaksi');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('transaksi/view/transaksi_manager');
        echo view('footer'); 
    } else {
        return redirect()->to('/home/dashboard');
    }
}

public function transaksi__search()
{
   if(!session()->get('id') > 0){
    return redirect()->to('/home/dashboard');
}

if(session()->get('level')== 2) {

    $model=new M_model();
    $on='transaksi.maker_transaksi=user.id_user';
    $where=$this->request->getPost('search__transaksi');
    $kui['duar']=$model->superLike2('transaksi', 'user', $on, 'user.username', 'transaksi.tanggal_transaksi', $where);
}

$id=session()->get('id');
$where=array('id_user'=>$id);
$kui['search']="on";

$where=array('id_user' => session()->get('id'));
$kui['foto']=$model->getRow('user',$where);

echo view ('header', $kui);
echo view ('menu');
echo view ('transaksi/view/transaksi_manager');
echo view ('footer');
}

public function add_transaction()
{
    if(session()->get('level')== 3) {

        $model=new M_model();
        $kui['duar']=$model->tampil('transaksi');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu');
        echo view('keranjang/bayar/bayar');
        echo view('footer'); 
    } else {
        return redirect()->to('/home/dashboard');
    }
}

public function aksi_add_transaction()
{
    $model = new M_model();
    $where=array('keranjang.maker_keranjang'=>session()->get('id'));
    $no_meja = $this->request->getPost('no_meja');
    $dengan = $this->request->getPost('dengan');
    $total_harga = $this->request->getPost('total_harga');
    $dibayar = $this->request->getPost('dibayar');
    $kembalian = $this->request->getPost('kembalian');
    $maker_transaksi = session()->get('id');
    $data = array(
        'no_meja' => 'Table ' . $no_meja,
        'dengan' => $dengan,
        'total_harga' => $total_harga,
        'pembayaran' => 'Cash',
        'dibayar' => $dibayar,
        'kembalian' => $kembalian,
        'maker_transaksi' => $maker_transaksi
    );

    // Simpan data transaksi
    $model->simpan('transaksi', $data);

    // Hapus semua data di tabel keranjang
    $model->hapus('keranjang', $where);

    $data=array(
        'id_user_log'=>session()->get('id'),
        'activity'=>"Membayar Makanan Dari Keranjang Dengan No Meja ". $no_meja."",
        'tanggal_activity'=>date('Y-m-d H:i:s')
    );
    $model->simpan('log_activity',$data);

    return redirect()->to('/home/transaction');
}

public function income_report()
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $kui['kunci']='view_income';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $kui['foto']=$model->getRow('user',$where);

        echo view('header',$kui);
        echo view('menu',$kui);
        echo view('laporan/filter',$kui);
        echo view('footer');

    }else{
        return redirect()->to('/home/dashboard');
    }
}
public function cari_income()
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['duar']=$model->filter('transaksi',$awal,$akhir);
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg');

        // $kui['foto'] = base64_encode($img);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Menampilkan Laporan Pendapatan Dengan Format Print",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        echo view('laporan/c_income',$kui);

    }else{
        return redirect()->to('/home/dashboard');
    }
}
public function pdf_income()
{
    if(session()->get('level')== 2) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['duar']=$model->filter('transaksi',$awal,$akhir);
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg');

        // $kui['foto'] = base64_encode($img);

        $data=array(
            'id_user_log'=>session()->get('id'),
            'activity'=>"Menampilkan Laporan Pendapatan Dengan Format PDF",
            'tanggal_activity'=>date('Y-m-d H:i:s')
        );
        $model->simpan('log_activity',$data);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/c_income',$kui));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));

    }else{
        return redirect()->to('/home/dashboard');
    }
}

public function excel_income()
{
    if (session()->get('level') == 2) {
        $model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $dataArray = $model->filter('transaksi', $awal, $akhir);

        $spreadsheet = new Spreadsheet();

        $style = $spreadsheet->getActiveSheet()->getStyle('A1:F1');
        $style->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Tanggal')
        ->setCellValue('B1', 'Nama Akun dan Keterangan')
        ->setCellValue('C1', 'Ref')
        ->setCellValue('D1', 'Debit')
        ->setCellValue('E1', 'Kredit')
        ->setCellValue('F1', 'Jumlah');

        $column = 2;
        $total_harga_total = 0;

        foreach ($dataArray as $data) {
            // Ubah format angka dibayar dan total_harga
            $total_harga = 'Rp. ' . number_format($data->total_harga, 0, ',', '.');

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, $data->tanggal_transaksi)
            ->setCellValue('B' . $column, $data->pembayaran . '/ Pendapatan')
            ->setCellValue('C' . $column, $data->id_transaksi . $data->maker_transaksi)
            ->setCellValue('D' . $column, $total_harga)
            ->setCellValue('E' . $column, $total_harga);
            
            $total_harga_total += $data->total_harga;

            $column++;
        }

        // Setelah loop selesai, tambahkan total harga ke sel F2
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('F2', 'Rp. ' . number_format($total_harga_total, 0, ',', '.'));

        $writer = new Xlsx($spreadsheet); // Perbaikan: Menggunakan Xlsx bukan XLsx
        $fileName = 'Income Report';

        $data = [
            'id_user_log' => session()->get('id'),
            'activity' => "Menampilkan Laporan Pendapatan Dengan Format Excel",
            'tanggal_activity' => date('Y-m-d H:i:s'),
        ];
        $model->simpan('log_activity', $data);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // Perbaikan: Memperbaiki header
        header('Content-Disposition: attachment; filename=' . $fileName . '.xlsx'); // Perbaikan: Menggunakan ekstensi file yang benar
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    } else {
        return redirect()->to('/home/dashboard');
    }
}




}
