@extends('layout.login')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Dokumentasi API</h1>
                                </div>
                                <div class="card  mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><b>Alamat API Utama</b></p>
                                        <a href="{{ url('/') }}/api">{{ url('/') }}/api/{iduser}</a>
                                        <p>Api ini digunakan untuk menampilkan informasi dari {iduser} dengan metode menggunakan GET</p>

                                        <p><b>API Create Akun Baru</b></p>
                                        <a href="{{ url('/') }}/api/create">{{ url('/') }}/api/create</a>
                                        <p>Gunakan Metode post dan isi dengan form sebagai berikut:</p>
                                        <p>Email, password, dan nama</p>
                                        <p>Anda akan mendapatkan token yang akan digunakan untuk update hapus data.</p>

                                        <p><b>API Login</b></p>
                                        <a href="{{ url('/') }}/api">{{ url('/') }}/api</a>
                                        <p>Gunakan Metode post dan isi dengan form sebagai berikut:</p>
                                        <p>Email dan password</p>
                                        <p>Catat token untuk dapat menggunakan metode update hapus data menggunakan api.</p>
                                        <pre class="soft-git clipboard">
                                            <code data-language="json">
                                                <?php 
                                                ?>
                                            </code>
                                        </pre>
                                    </div>
                                </div>
                                <div class="card  mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">API Kirim Pesan</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><b>Alamat API Utama</b></p>
                                        <a href="{{ url('/') }}/api/msg">{{ url('/') }}/api/msg</a>
                                        <p>Api ini digunakan mengirimkan pesan antara pengguna. Form yang harus diisi sebagai berikut</p>
                                        <ul>
                                            <li>{iduser_to} => iduser yang akan menerima pesan </li>
                                            <li>{iduser_send} => iduser yang akan mengirim pesan </li>
                                            <li>{token} => token iduser pengirim pesan </li>
                                            <li>{msg} => pesan yang akan dikirim oleh pengirim pesan </li>
                                        </ul>
                                        <pre class="soft-git clipboard">
                                            <code data-language="json">
                                                <?php 
                                                ?>
                                            </code>
                                        </pre>
                                    </div>

                                </div>
                                <div class="card  mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">API UPDATE</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><b>Alamat API Update Informasi Akun</b></p>
                                        <a href="{{ url('/') }}/api/update">{{ url('/') }}/api/update</a>
                                        <p>Api ini digunakan update data user. Form yang harus diisi sebagai berikut</p>
                                        <ul>
                                            <li>{email} => email tujuan</li>
                                            <li>{token} => token user</li>
                                            <li>{nama} => nama terbaru</li>
                                            <li>{password} => password terbaru</li>
                                            <li>{hp} => nomor hp terbaru</li>
                                        </ul>
                                        <pre class="soft-git clipboard">
                                            <code data-language="json">
                                                <?php 
                                                ?>
                                            </code>
                                        </pre>
                                    </div>
                                    
                                </div>
                                <div class="card  mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">API UPDATE FOTO</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><b>Alamat API Update Foto</b></p>
                                        <a href="{{ url('/') }}/api/foto">{{ url('/') }}/api/foto</a>
                                        <p>Api ini digunakan update foto user. Form yang harus diisi sebagai berikut</p>
                                        <ul>
                                            <li>{file} => file untuk foto</li>
                                            <li>{token} => token user</li>
                                        </ul>
                                        <p><b>Alamat API Ubah Foto ke Default/del foto </b></p>
                                        <a href="{{ url('/') }}/api/foto">{{ url('/') }}/api/foto</a>
                                        <p>Api ini digunakan update foto user. Form yang harus diisi sebagai berikut</p>
                                        <ul>
                                            <li>{email} => email</li>
                                            <li>{token} => token user</li>
                                        </ul>
                                        <pre class="soft-git clipboard">
                                            <code data-language="json">
                                                <?php 
                                                ?>
                                            </code>
                                        </pre>
                                    </div>
                                    
                                </div>
                                <div class="card  mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">API Del</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><b>Alamat API Utama</b></p>
                                        <a href="{{ url('/') }}/api/del">{{ url('/') }}/api/del</a>
                                        <p>Api ini digunakan menghapus akun menggunakan metode POST. Berikut form yang harus diinputkan</p>
                                        <ul>
                                            <li>{email} => email user yang akan dihapus</li>
                                            <li>{token} => token user yang akan dihapus </li>
                                        </ul>
                                        <pre class="soft-git clipboard">
                                            <code data-language="json">
                                                <?php 
                                                ?>
                                            </code>
                                        </pre>
                                    </div>
                                    
                                </div>
                                <pre class="soft-git clipboard">
                                    <code data-language="json">

                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection