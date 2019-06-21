<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
{{-- import data --}}
<li class="treeview">
	<a href="#"><i class="fa fa-wrench"></i> <span>Data</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li class="treeview">
			<a href="#"><i class="fa fa-upload"></i> <span>Import Data</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href='{{ backpack_url('importpage-hujan') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Hujan</span></a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#"><i class="fa fa-list"></i> <span>Data Iklim</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href='{{ backpack_url('bolakering') }}'><i class='fa fa-tag'></i> <span>Bola Kering </span> <span class="label label-success pull-right" >Tt</span></a></li>
				<li><a href='{{ backpack_url('bolabasah') }}'><i class='fa fa-tag'></i> <span>Bola Basah </span><span class="label label-success pull-right" >Tw</span></a></li>
				<li><a href='{{ backpack_url('dewpoint') }}'><i class='fa fa-tag'></i> <span>Dew Point</span><span class="label label-success pull-right" >Td</span></a></li>
				<li><a href='{{ backpack_url('humidity') }}'><i class='fa fa-tag'></i> <span>Kelembapan Udara</span><span class="label label-success pull-right" >Rh</span></a></li>
				<li><a href='{{ backpack_url('rain') }}'><i class='fa fa-tag'></i> <span>Hujan</span><span class="label label-success pull-right" >RR</span></a></li>
				<li><a href='{{ backpack_url('penyinaran') }}'><i class='fa fa-tag'></i> <span>Penyinaran </span><span class="label label-success pull-right" >SSS</span></a></li>
				<li><a href='{{ backpack_url('arahangin') }}'><i class='fa fa-tag'></i> <span>Arah Angin</span><span class="label label-success pull-right" >DDD</span></a></li>
				<li><a href='{{ backpack_url('kecangin') }}'><i class='fa fa-tag'></i> <span>Kecepatan Angin</span><span class="label label-success pull-right" >FFF</span></a></li>
				<li><a href='{{ backpack_url('tekanan') }}'><i class='fa fa-tag'></i> <span>Tekanan</span><span class="label label-success pull-right" >PPP</span></a></li>
				<li><a href='{{ backpack_url('penguapan') }}'><i class='fa fa-tag'></i> <span>Penguapan</span><span class="label label-success pull-right" >EEE</span></a></li>
				<li><a href='{{ backpack_url('tmax') }}'><i class='fa fa-tag'></i> <span>Temperatur Maks</span><span class="label label-success pull-right" >Tmax</span></a></li>
				<li><a href='{{ backpack_url('tmin') }}'><i class='fa fa-tag'></i> <span>Temperatur Min</span><span class="label label-success pull-right" >Tmin</span></a></li>
				<li><a href='{{ backpack_url('radiasi') }}'><i class='fa fa-tag'></i> <span>Radiasi</span><span class="label label-success pull-right" >SR</span></a></li>
				<li><a href='{{ backpack_url('trumput') }}'><i class='fa fa-tag'></i> <span>Tanah Berumput</span><span class="label label-success pull-right" ></span></a></li>
				<li><a href='{{ backpack_url('tgundul') }}'><i class='fa fa-tag'></i> <span>Tanah Gundul</span><span class="label label-success pull-right" ></span></a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#"><i class="fa fa-book"></i> <span>Metadata</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href='{{ backpack_url('stasiun') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Stasiun</span></a></li>
				<li><a href='{{ backpack_url('alat') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Alat</span></a></li>
			</ul>
		</li>
	</ul>

</li>


{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}



