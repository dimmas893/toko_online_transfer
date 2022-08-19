@extends('user.app')
@section('content')
<div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Detail Alamat
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

        <div class="site-section">
            <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.alamat.simpan') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                <label for="">Pilih Provinsi</label>
                                <select name="province_id" id="province_id" class="form-control">
                                <option value="">Pilih Provinsi</option>
                                @foreach($province as $provinsi)
                                    <option value="{{ $provinsi->province_id }}">{{ $provinsi->title }}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="form-grup">
                                    <label for="">Pilih Kota/Kabupaten</label>
                                    <select name="cities_id" id="cities_id" class="form-control">
                                </select>
                                </div>
                                <div class="form-grup">
                                    <label for="">Alamat Lengkap</label>
                                    <input type="text" name="detail" id="" placeholde="Kecamatan/Desa/Nama Jalan" class="form-control">
                                </select>
                                </div>
                                <div class="mt-4 text-right">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            </div>
        </div>
</div>  
@endsection
@section('js')
<script type="text/javascript">
var toHtml = (tag, value) => {
	$(tag).html(value);
	}
 $(document).ready(function() {
    //  $('#province_id').select2();
    //  $('#cities_id').select2();
     $('#province_id').on('change',function(){
     var id = $('#province_id').val();
     var url = window.location.href;
     var urlNya = url.substring(0, url.lastIndexOf('/alamat/'));   
     $.ajax({
         type:'GET',
         url:urlNya + '/getcity/' + id,
         dataType:'json',
         success:function(data){
            var op = '<option value="">Pilih Kota</option>';
            if(data.length > 0) {
			var i = 0;
			for(i = 0; i < data.length; i++) {
				op += `<option value="${data[i].city_id}">${data[i].title}</option>`
			}
		    }
            toHtml('[name="cities_id"]', op);
         }
     })
     })
 });
</script>
@endsection