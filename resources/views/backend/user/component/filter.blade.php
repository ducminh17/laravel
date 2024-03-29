<div class="filter-warpper">
    <div class="perpage">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <select name="perpage" class="form-control input-sm perpage filter mr10">
                @for( $i = 20 ;$i <= 200; $i+=20)
                <option value="{{$i}}">{{$i}} ban ghi</option>
                @endfor
            </select>
        </div>
    </div>       
        <div class="action">
            <div class="uk-flex uk-flex-middle">
                <select name="user_catalogue_id" class="form-control mr10">
                        <option value="0" selected="selected">chon nhom thanh vien</option>
                        <option value="1"> Quan tri vien</option>
                </select>
                <div class="uk-flex uk-flex-middle mr10">
                    <div class="input-group">
                         <input type="text" name="keyword" value="" placeholder="Nhap tu khoa ban muon tim kiem" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" name="search" value="search" 
                            class="btn btn=primary mb0 btn-sm">Tim kiem
                            </button>
                        </span>
                    </div>
                </div>   
                <a  href="{{route('user.create')}}" class="btn btn-danger"><i class="fa fa-plus"></i>Them moi thanh vien</a>  
            </div>
        </div>        
    </div>
</div>