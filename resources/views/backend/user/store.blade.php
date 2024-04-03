@include('backend.dashboard.component.breadcrumb', ['title'=>$config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $url=($config['method']=='create') ? route('user.store'):route('user.update',$user->id);
@endphp
<form action="{{$url}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head ">
                    <div class="pannel-title">Thong tin chung</div>
                    <div  class="panel-description"><p>- Nhập thông tin của người sử dụng </p>
                        <p>-Lưu ý : Những trường đánh dấu <span class="text-danger">(*)</span>Là bắt buộc</p>
                    </div>
                </div>   
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email<span class="text-danger">(*)</span></label>
                                    <input  type="email" 
                                            name="email"
                                            value="{{old('email', ($user->email) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ Tên<span class="text-danger">(*)</span></label>
                                    <input  type="text" 
                                            name="name"
                                            value="{{old('name',($user->name) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            @php
                                $userCataloque = [
                                    '[Chọn Nhóm Thành Viên]',
                                    'Quản trị viên',
                                    'Cộng tác viên'
                                ];    
                            @endphp
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm Thành Viên<span class="text-danger">(*)</span></label>
                                    <select name="user_cataloque_id" class="form-control setupSelect2">
                                        @foreach($userCataloque as $key => $item)
                                        <option {{$key == old('user_cataloque_id',(isset($user->user_cataloque_id))?$user->user_cataloque_id:'')?'selected':''}} value="{{$key}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh<span class="text-danger">(*)</span></label>
                                    <input  type="date" 
                                            name="birthday"
                                            value="{{old('birthday',(isset($user->birthday)) ? date ('Y-m-d',strtotime($user->birthday)) : '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            @if($config['method']=='create')
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mật khẩu<span class="text-danger">(*)</span></label>
                                    <input  type="password" 
                                            name="password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhập lại mật khẩu<span class="text-danger">(*)</span></label>
                                    <input  type="password" 
                                            name="re_password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh</label>
                                    <input  type="text" 
                                            name="image"
                                            value="{{old('image',($user->image)??'')}}"
                                            class="form-control input-image"
                                            placeholder=""
                                            autocomplete="off"
                                            data-upload="Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>          
        </div> 
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head ">
                    <div class="pannel-title">Thông Tin Liên Hệ</div>
                    <div  class="panel-description">Nhập thông tin liên hệ của người sử dụng </div>
                </div>   
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Thành Phố<span class="text-danger">(*)</span></label>
                                    <select name="province_id" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if(isset($provinces))
                                            @foreach ($provinces as  $province)
                                            <option @if(old('province_id')==$province->code) selected @endif value="{{$province->code}}">{{$province->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Quận Huyện<span class="text-danger">(*)</span></label>
                                    <select name="district_id" class="form-control districts setupSelect2 location" data-target="wards" >
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Phường Xã<span class="text-danger">(*)</span></label>
                                    <select name="ward_id" class="form-control setupSelect2 wards ">
                                        <option value="0">Chọn Phường Xã </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ<span class="text-danger">(*)</span></label>
                                    <input  type="text" 
                                            name="address"
                                            value="{{old('address',($user->address)??'')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Số điện thoại </label>
                                    <input  type="text" 
                                            name="phone"
                                            value="{{old('phone',($user->phone)??'')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi Chú</label>
                                    <input  type="text" 
                                            name="description"
                                            value="{{old('description',($user->description)??'')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>          
        </div> 
        <div class="text-right">
            <button  type="submit" class="btn btn-primary" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>
<script>
    var province_id ='{{ (isset($user->province_id)) ? $user->province_id : old('province_id') }}'
    var district_id ='{{ (isset($user->district_id)) ? $user->district_id : old('district_id') }}'
    var ward_id = '{{ (isset($user->ward_id)) ? $user->ward_id : old('ward_id') }}'
</script>