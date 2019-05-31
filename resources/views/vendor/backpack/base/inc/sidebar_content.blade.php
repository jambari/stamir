<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

{{-- Hujan --}}
<li class="treeview">
	<a href="#"><i class="fa fa-list"></i> <span>Daftar Hujan</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('stasiun') }}'><i class='fa fa-home'></i> <span>Stasiun Hujan</span></a></li>
		<li><a href='{{ backpack_url('hujan') }}'><i class='wi wi-raindrops' style="margin-right: 1em;" ></i> <span>Hujan</span></a></li>
	</ul>
</li>

<li class="treeview">
	<a href="#"><i class="fa fa-list"></i> <span>AgM1a</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('temperatur') }}'><i class='fa fa-tag'></i> <span>Temperatur</span></a></li>
		<li><a href='{{ backpack_url('nisbi') }}'><i class='fa fa-tag'></i> <span>Lembab Nisbi</span></a></li>
		<li><a href='{{ backpack_url('angin') }}'><i class='fa fa-tag'></i> <span>Angin</span></a></li>
		<li><a href='{{ backpack_url('penyinaran') }}'><i class='fa fa-tag'></i> <span>Penyinaran</span></a></li>
	</ul>
</li>



<li class="treeview">
	<a href="#"><i class="fa fa-list"></i> <span>Metadata</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('alat') }}'><i class='fa fa-folder'></i> <span>Alat</span></a></li>
		<li><a href='{{ backpack_url('calibration') }}'><i class='fa fa-folder'></i> <span>Kalibrasi</span></a></li>
	</ul>
</li>
{{-- elfinder --}}
{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}











