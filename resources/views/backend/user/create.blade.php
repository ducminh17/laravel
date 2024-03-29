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
<form action="{{route('user.store')}}" method="post" class="box">
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
                                            value="{{old('email')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ Tên<span class="text-danger">(*)</span></label>
                                    <input  type="email" 
                                            name="name"
                                            value="{{old('name')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm Thành Viên<span class="text-danger">(*)</span></label>
                                    <select name="user_cataloque_id" class="form-control setupSelect2">
                                        <option value="0">Chọn nhóm thành viên</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Cộng tác viên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh<span class="text-danger">(*)</span></label>
                                    <input  type="text" 
                                            name="birthday"
                                            value="{{old('birthday')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off">
                                </div>
                            </div>
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
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh</label>
                                    <input  type="text" 
                                            name="image"
                                            value="{{old('image')}}"
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
                                            <option value="{{$province->code}}">{{$province->name}}</option>
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
                                            value="{{old('address')}}"
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
                                            value="{{old('phone')}}"
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
                                            value="{{old('description')}}"
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