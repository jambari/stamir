<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

{{-- Hujan --}}
{{-- <li><a href='{{ backpack_url('hujan') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;" ></i><span>Hujan</span></a></li> --}}
<li class="treeview">
	<a href="#"><i class="fa fa-list"></i> <span>Metadata</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('stasiun') }}'><i class='fa fa-book'></i> <span>Stasiun</span></a></li>
		<li><a href='{{ backpack_url('alat') }}'><i class='fa fa-book'></i> <span>Daftar alat</span></a></li>
		{{-- <li><a href='{{ backpack_url('calibration') }}'><i class='fa fa-folder'></i> <span>Kalibrasi</span></a></li> --}}
	</ul>
</li>

{{-- import data --}}

<li class="treeview">
	<a href="#"><i class="fa fa-upload"></i> <span>Import Data</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('importpage-hujan') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Hujan</span></a></li>
{{-- 		<li><a href='{{ backpack_url('importpage-temperatur') }}'><i class='wi wi-thermometer' style="margin-right: 0.8em;"></i> <span>Temperatur</span></a></li>
		<li><a href='{{ backpack_url('importpage-nisbi') }}'><i class='wi wi-humidity' style="margin-right: 0.8em;"></i> <span>Lembab Nisbi</span></a></li> --}}
	</ul>
</li>

{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}
