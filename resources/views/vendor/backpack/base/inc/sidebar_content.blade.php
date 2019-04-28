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
<li><a href='{{ backpack_url('agm1a') }}'><i class='fa fa-tag'></i> <span>AgM1a</span></a></li>
<li><a href='{{ backpack_url('agm1b') }}'><i class='fa fa-tag'></i> <span>AgM1b</span></a></li>
{{-- elfinder --}}
{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}





