@extends('layouts.app')
@section('content')
<div class="bg-body-light">
	<div class="content content-full">
		<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
			<h1 class="flex-sm-fill h3 my-2">
				Pengaturan
			</h1>
		</div>
	</div>
</div>
<div class="content">
	<form action="{{url('pengaturan/store')}}" id="form" class="js-validation" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="block">
			<div class="col-lg-12">
				<input type="text" style="display: none" id="address" value="">
				<input type="text" class="form-control" style="display: none" value="" name="mode" id="mode"> 
				<div class="block">
					<ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
						@if(in_array(Auth::user()->roles[0]->id,getConfigValues('ROLE_ADMIN')))
						<li class="nav-item">
							<a class="nav-link active" href="#config">ID Konfigurasi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#perusahaan">Perusahaan</a>
						</li>
						@endif
					</ul>
					<div class="block-content tab-content overflow-hidden">
						@if(in_array(Auth::user()->roles[0]->id,getConfigValues('ROLE_ADMIN')))
						<div class="tab-pane fade fade-left show active" id="config" role="tabpanel">
							@include('pengaturan.config')
						</div>
						<div class="tab-pane fade fade-left" id="perusahaan" role="tabpanel">
							<h4 class="font-w400">Profile Content</h4>
							<p>Content slides in to the left..</p>
						</div>
						@endif
						<div class="form-group row">
							<div class="col-12 text-right">
								<button class="btn btn-primary" id="simpan" style="display: none">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@php
if(in_array(Auth::user()->roles[0]->id,getConfigValues('ROLE_ADMIN')))
{
	$start='#config';
}
elseif(in_array(Auth::user()->roles[0]->id,getConfigValues('ROLE_ADMIN')))
{
	$start='#perusahaan';
}
else
{
	$start='#user_settings';
}
@endphp

@endsection

@push('js')
<script type="text/javascript">
	var nama='{{$start}}';
	$(document).ready(function(){
		$('#address').val(nama);
		$('[href="'+nama+'"]').click();

		if(nama=='#perusahaan')
		{
			$('#mode').val('perusahaan');
			$('#simpan').fadeIn();
		}

		if(nama=='#user_settings')
		{
			$('#mode').val('user_settings');
			$('#simpan').fadeIn();
		}

		 $('.nav-tabs-block li a.nav-link').click(function(){
            var a=$(this).attr('href');
            $('#address').val(a);
            if(a=='#config')
            {
            	$('#simpan').fadeOut();
            }
            else if(a=='#perusahaan')
            {
            	$('#simpan').fadeIn();
            }

            else if(a=='#prefix')
            {
            	prefix();
            }

            else if(a=='#user_settings')
            {
            	user_settings();
            }
         })
	});
</script>
@endpush