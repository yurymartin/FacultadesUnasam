<!-- Content Header (Page header) -->
<section class="content-header" id="divtitulo" style="display:none">
    <h1>
        {{-- @yield('contentheader_title', 'Page Header here') --}}
        @{{ titulo }}
        <small>@{{ subtitulo }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i v-bind:class="classTitle"></i> @{{ titulo }}</a></li>
        <li class="active">@{{ subtitulo }}</li>
        <li v-if="subtitle2">@{{ subtitulo2 }}</li>
    </ol>
</section>