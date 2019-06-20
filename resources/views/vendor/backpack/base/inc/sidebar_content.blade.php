<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li class="treeview">
	<a href="#"><i class="fa fa-book"></i> <span>Metadata</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('stasiun') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Stasiun</span></a></li>
		<li><a href='{{ backpack_url('alat') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Alat</span></a></li>
	</ul>
</li>

<li class="treeview">
	<a href="#"><i class="fa fa-list"></i> <span>Data Iklim</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('bolakering') }}'><i class='wi wi-humidity' style="margin-right: 0.8em;"></i> <span>Bola Kering</span></a></li>
		<li><a href='{{ backpack_url('bolabasah') }}'><i class='wi wi-cloudy' style="margin-right: 0.8em;"></i> <span>Bola Basah</span></a></li>
		<li><a href='{{ backpack_url('dewpoint') }}'><i class='fa fa-tag'></i> <span>Dew Point</span></a></li>
	</ul>
</li>

{{-- import data --}}

<li class="treeview">
	<a href="#"><i class="fa fa-upload"></i> <span>Import Data</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('importpage-hujan') }}'><i class='wi wi-raindrops' style="margin-right: 0.8em;"></i> <span>Hujan</span></a></li>
	</ul>
</li>

{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}



