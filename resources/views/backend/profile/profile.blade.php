@extends('backend.layouts.layout')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profil</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profil</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{old('name',$user->name)}}!</h2>
      <p class="section-lead">
        Profil məlumatlarınızı dəyişə bilərsiniz
      </p>

      <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">

              <div class="card-header">
                <h4>Profil Məlumatları</h4>
              </div>
              <div class="card-body">
                  <form action="{{ route('profile.update') }}" method="post">
                      @csrf
                      @method('patch')
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Ad</label>
                          <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}" required="">
                          @if ($errors->has('name'))
                              <code>{{$errors->first('name')}}</code>
                          @endif
                        </div>

                        <div class="form-group col-md-6 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}" required="">
                          @if ($errors->has('email'))
                              <code>{{$errors->first('email')}}</code>
                          @endif
                        </div>
                      </div>
                      <div class="card-footer text-right" style="
                      margin-top: 20px;
                      justify-content: flex-end;
                      display: flex;
                  ">
                          <button class="btn btn-primary">Dəyişiklikləri yadda saxlayın</button>
                        </div>
                  </form>

              </div>
          </div>

           <div class="card">

                <div class="card-header">
                  <h4>Şifrəni yeniləyin</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                          <div class="form-group  col-12">
                            <label>Cari Şifrə</label>
                            <input type="password" class="form-control" name="current_password" autocomplete="current-password">
                            @if ($errors->updatePassword->has('current_password'))
                                <code>{{$errors->updatePassword->first('current_password')}}</code>
                            @endif
                          </div>

                          <div class="form-group  col-12">
                              <label>Yeni Şifrə</label>
                              <input type="password" class="form-control" name="password" autocomplete="new-password">
                              @if ($errors->updatePassword->has('password'))
                                  <code>{{$errors->updatePassword->first('password')}}</code>
                              @endif
                          </div>

                          <div class="form-group col-12">
                              <label>Şifrəni təsdiqləyin</label>
                              <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                              @if ($errors->updatePassword->has('password_confirmation'))
                                  <code>{{$errors->updatePassword->first('password_confirmation')}}</code>
                              @endif
                          </div>



                        </div>
                        <div class="card-footer text-right" style="
                        margin-top: 20px;
                        justify-content: flex-end;
                        display: flex;
                    ">
                            <button type="submit" class="btn btn-primary">Dəyişiklikləri yadda saxlayın</button>
                          </div>
                    </form>

                </div>

            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
