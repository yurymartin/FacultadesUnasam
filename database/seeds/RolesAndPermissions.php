<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        //Permisos de la facultad
        Permission::create(['name'=>'create facultad']);
        Permission::create(['name'=>'read facultad']);
        Permission::create(['name'=>'update facultad']);
        Permission::create(['name'=>'delete facultad']);

        //Permisos de la descripcion de la facultad
        Permission::create(['name'=>'create descripcion facultad']);
        Permission::create(['name'=>'read descripcion facultad']);
        Permission::create(['name'=>'update descripcion facultad']);
        Permission::create(['name'=>'delete descripcion facultad']);

        //Permisos de las redes sociales de la facultad
        Permission::create(['name'=>'create redes sociales facultad']);
        Permission::create(['name'=>'read redes sociales facultad']);
        Permission::create(['name'=>'update redes sociales facultad']);
        Permission::create(['name'=>'delete redes sociales facultad']);

        //Permisos de los banners Facultad
        Permission::create(['name'=>'create banners facultad']);
        Permission::create(['name'=>'read banners facultad']);
        Permission::create(['name'=>'update banners facultad']);
        Permission::create(['name'=>'delete banners facultad']);

        //Permisos de los eventos Facultad
        Permission::create(['name'=>'create eventos facultad']);
        Permission::create(['name'=>'read eventos facultad']);
        Permission::create(['name'=>'update eventos facultad']);
        Permission::create(['name'=>'delete eventos facultad']);

        //Permisos de los noticias Facultad
        Permission::create(['name'=>'create noticias facultad']);
        Permission::create(['name'=>'read noticias facultad']);
        Permission::create(['name'=>'update noticias facultad']);
        Permission::create(['name'=>'delete noticias facultad']);
        
        //Permisos de los galerias Facultad
        Permission::create(['name'=>'create galerias facultad']);
        Permission::create(['name'=>'read galerias facultad']);
        Permission::create(['name'=>'update galerias facultad']);
        Permission::create(['name'=>'delete galerias facultad']);

        //Permisos de los videos Facultad
        Permission::create(['name'=>'create videos facultad']);
        Permission::create(['name'=>'read videos facultad']);
        Permission::create(['name'=>'update videos facultad']);
        Permission::create(['name'=>'delete videos facultad']);

        //Permisos de los documentos Facultad
        Permission::create(['name'=>'create documentos']);
        Permission::create(['name'=>'read documentos']);
        Permission::create(['name'=>'update documentos']);
        Permission::create(['name'=>'delete documentos']);

        //Permisos de los organigramas Facultad
        Permission::create(['name'=>'create organigramas']);
        Permission::create(['name'=>'read organigramas']);
        Permission::create(['name'=>'update organigramas']);
        Permission::create(['name'=>'delete organigramas']);

        //Permisos de los escuelas
        Permission::create(['name'=>'create escuelas']);
        Permission::create(['name'=>'read escuelas']);
        Permission::create(['name'=>'update escuelas']);
        Permission::create(['name'=>'delete escuelas']);

        //Permisos de los descripcion escuelas
        Permission::create(['name'=>'create descripcion escuelas']);
        Permission::create(['name'=>'read descripcion escuelas']);
        Permission::create(['name'=>'update descripcion escuelas']);
        Permission::create(['name'=>'delete descripcion escuelas']);

        //Permisos de los campolaboral escuelas
        Permission::create(['name'=>'create campolaboral escuelas']);
        Permission::create(['name'=>'read campolaboral escuelas']);
        Permission::create(['name'=>'update campolaboral escuelas']);
        Permission::create(['name'=>'delete campolaboral escuelas']);

        //Permisos de los perfilprofesional escuelas
        Permission::create(['name'=>'create perfilprofesional escuelas']);
        Permission::create(['name'=>'read perfilprofesional escuelas']);
        Permission::create(['name'=>'update perfilprofesional escuelas']);
        Permission::create(['name'=>'delete perfilprofesional escuelas']);

        //Permisos de las redes sociales de las escuelas
        Permission::create(['name'=>'create redes sociales escuelas']);
        Permission::create(['name'=>'read redes sociales escuelas']);
        Permission::create(['name'=>'update redes sociales escuelas']);
        Permission::create(['name'=>'delete redes sociales escuelas']);

        //Permisos de los banners escuelas
        Permission::create(['name'=>'create banners escuelas']);
        Permission::create(['name'=>'read banners escuelas']);
        Permission::create(['name'=>'update banners escuelas']);
        Permission::create(['name'=>'delete banners escuelas']);

        //Permisos de los videos escuelas
        Permission::create(['name'=>'create videos escuelas']);
        Permission::create(['name'=>'read videos escuelas']);
        Permission::create(['name'=>'update videos escuelas']);
        Permission::create(['name'=>'delete videos escuelas']);

        //Permisos de los galerias escuelas
        Permission::create(['name'=>'create galerias escuelas']);
        Permission::create(['name'=>'read galerias escuelas']);
        Permission::create(['name'=>'update galerias escuelas']);
        Permission::create(['name'=>'delete galerias escuelas']);

        //Permisos de los mallas escuelas
        Permission::create(['name'=>'create mallas escuelas']);
        Permission::create(['name'=>'read mallas escuelas']);
        Permission::create(['name'=>'update mallas escuelas']);
        Permission::create(['name'=>'delete mallas escuelas']);

        //Permisos de los grados academicos
        Permission::create(['name'=>'create grados academicos']);
        Permission::create(['name'=>'read grados academicos']);
        Permission::create(['name'=>'update grados academicos']);
        Permission::create(['name'=>'delete grados academicos']);

        //Permisos de los cargos
        Permission::create(['name'=>'create cargos']);
        Permission::create(['name'=>'read cargos']);
        Permission::create(['name'=>'update cargos']);
        Permission::create(['name'=>'delete cargos']);

        //Permisos de los autoridades
        Permission::create(['name'=>'create autoridades']);
        Permission::create(['name'=>'read autoridades']);
        Permission::create(['name'=>'update autoridades']);
        Permission::create(['name'=>'delete autoridades']);

        //Permisos de los departamentoacademico
        Permission::create(['name'=>'create departamentoacademico']);
        Permission::create(['name'=>'read departamentoacademico']);
        Permission::create(['name'=>'update departamentoacademico']);
        Permission::create(['name'=>'delete departamentoacademico']);

        //Permisos de los categoriadocente
        Permission::create(['name'=>'create categoriadocente']);
        Permission::create(['name'=>'read categoriadocente']);
        Permission::create(['name'=>'update categoriadocente']);
        Permission::create(['name'=>'delete categoriadocente']);

        //Permisos de los docentes
        Permission::create(['name'=>'create docentes']);
        Permission::create(['name'=>'read docentes']);
        Permission::create(['name'=>'update docentes']);
        Permission::create(['name'=>'delete docentes']);

        //Permisos de los comitestudiantil
        Permission::create(['name'=>'create comitestudiantil']);
        Permission::create(['name'=>'read comitestudiantil']);
        Permission::create(['name'=>'update comitestudiantil']);
        Permission::create(['name'=>'delete comitestudiantil']);

        //Permisos de los alumnos
        Permission::create(['name'=>'create alumnos']);
        Permission::create(['name'=>'read alumnos']);
        Permission::create(['name'=>'update alumnos']);
        Permission::create(['name'=>'delete alumnos']);

        //Permisos de los temainvestigacion
        Permission::create(['name'=>'create temainvestigacion']);
        Permission::create(['name'=>'read temainvestigacion']);
        Permission::create(['name'=>'update temainvestigacion']);
        Permission::create(['name'=>'delete temainvestigacion']);

        //Permisos de los investigaciones
        Permission::create(['name'=>'create publicaciones']);
        Permission::create(['name'=>'read publicaciones']);
        Permission::create(['name'=>'update publicaciones']);
        Permission::create(['name'=>'delete publicaciones']);

        //Permisos de los investigaciones
        Permission::create(['name'=>'create tipo publicacion']);
        Permission::create(['name'=>'read tipo publicacion']);
        Permission::create(['name'=>'update tipo publicacion']);
        Permission::create(['name'=>'delete tipo publicacion']);

        //Permisos de los permisos de usuarios
        Permission::create(['name'=>'create permisos']);
        Permission::create(['name'=>'read permisos']);
        Permission::create(['name'=>'update permisos']);
        Permission::create(['name'=>'delete permisos']);

        //Permisos de los roles del usuario
        Permission::create(['name'=>'create roles']);
        Permission::create(['name'=>'read roles']);
        Permission::create(['name'=>'update roles']);
        Permission::create(['name'=>'delete roles']);

        //Permisos de los usuario
        Permission::create(['name'=>'create usuario']);
        Permission::create(['name'=>'read usuario']);
        Permission::create(['name'=>'update usuario']);
        Permission::create(['name'=>'delete usuario']);

        //Permisos de los etilos
        Permission::create(['name'=>'update estilos']);
        
        //create roles and assign created permissions
        


        //Creacion de usuario y asignacion de roles al usuario admin
        $role = Role::create(['name'=>'admin']);
        $role->givePermissionTo('create facultad');
        $role->givePermissionTo('read facultad');
        $role->givePermissionTo('update facultad');
        $role->givePermissionTo('delete facultad');

        $role->givePermissionTo('create descripcion facultad');
        $role->givePermissionTo('read descripcion facultad');
        $role->givePermissionTo('update descripcion facultad');
        $role->givePermissionTo('delete descripcion facultad');

        $role->givePermissionTo('create redes sociales facultad');
        $role->givePermissionTo('read redes sociales facultad');
        $role->givePermissionTo('update redes sociales facultad');
        $role->givePermissionTo('delete redes sociales facultad');
        
        $role->givePermissionTo('create banners facultad');
        $role->givePermissionTo('read banners facultad');
        $role->givePermissionTo('update banners facultad');
        $role->givePermissionTo('delete banners facultad');
        
        $role->givePermissionTo('create eventos facultad');
        $role->givePermissionTo('read eventos facultad');
        $role->givePermissionTo('update eventos facultad');
        $role->givePermissionTo('delete eventos facultad');
        
        $role->givePermissionTo('create noticias facultad');
        $role->givePermissionTo('read noticias facultad');
        $role->givePermissionTo('update noticias facultad');
        $role->givePermissionTo('delete noticias facultad');
        
        $role->givePermissionTo('create galerias facultad');
        $role->givePermissionTo('read galerias facultad');
        $role->givePermissionTo('update galerias facultad');
        $role->givePermissionTo('delete galerias facultad');
        
        $role->givePermissionTo('create videos facultad');
        $role->givePermissionTo('read videos facultad');
        $role->givePermissionTo('update videos facultad');
        $role->givePermissionTo('delete videos facultad');
        
        $role->givePermissionTo('create documentos');
        $role->givePermissionTo('read documentos');
        $role->givePermissionTo('update documentos');
        $role->givePermissionTo('delete documentos');
        
        $role->givePermissionTo('create organigramas');
        $role->givePermissionTo('read organigramas');
        $role->givePermissionTo('update organigramas');
        $role->givePermissionTo('delete organigramas');
        
        $role->givePermissionTo('create escuelas');
        $role->givePermissionTo('read escuelas');
        $role->givePermissionTo('update escuelas');
        $role->givePermissionTo('delete escuelas');
        
        $role->givePermissionTo('create descripcion escuelas');
        $role->givePermissionTo('read descripcion escuelas');
        $role->givePermissionTo('update descripcion escuelas');
        $role->givePermissionTo('delete descripcion escuelas');
        
        $role->givePermissionTo('create campolaboral escuelas');
        $role->givePermissionTo('read campolaboral escuelas');
        $role->givePermissionTo('update campolaboral escuelas');
        $role->givePermissionTo('delete campolaboral escuelas');
        
        $role->givePermissionTo('create perfilprofesional escuelas');
        $role->givePermissionTo('read perfilprofesional escuelas');
        $role->givePermissionTo('update perfilprofesional escuelas');
        $role->givePermissionTo('delete perfilprofesional escuelas');

        $role->givePermissionTo('create redes sociales escuelas');
        $role->givePermissionTo('read redes sociales escuelas');
        $role->givePermissionTo('update redes sociales escuelas');
        $role->givePermissionTo('delete redes sociales escuelas');
        
        $role->givePermissionTo('create banners escuelas');
        $role->givePermissionTo('read banners escuelas');
        $role->givePermissionTo('update banners escuelas');
        $role->givePermissionTo('delete banners escuelas');
        
        $role->givePermissionTo('create videos escuelas');
        $role->givePermissionTo('read videos escuelas');
        $role->givePermissionTo('update videos escuelas');
        $role->givePermissionTo('delete videos escuelas');
        
        $role->givePermissionTo('create galerias escuelas');
        $role->givePermissionTo('read galerias escuelas');
        $role->givePermissionTo('update galerias escuelas');
        $role->givePermissionTo('delete galerias escuelas');
        
        $role->givePermissionTo('create mallas escuelas');
        $role->givePermissionTo('read mallas escuelas');
        $role->givePermissionTo('update mallas escuelas');
        $role->givePermissionTo('delete mallas escuelas');
        
        $role->givePermissionTo('create grados academicos');
        $role->givePermissionTo('read grados academicos');
        $role->givePermissionTo('update grados academicos');
        $role->givePermissionTo('delete grados academicos');
        
        $role->givePermissionTo('create cargos');
        $role->givePermissionTo('read cargos');
        $role->givePermissionTo('update cargos');
        $role->givePermissionTo('delete cargos');
        
        $role->givePermissionTo('create autoridades');
        $role->givePermissionTo('read autoridades');
        $role->givePermissionTo('update autoridades');
        $role->givePermissionTo('delete autoridades');
        
        $role->givePermissionTo('create departamentoacademico');
        $role->givePermissionTo('read departamentoacademico');
        $role->givePermissionTo('update departamentoacademico');
        $role->givePermissionTo('delete departamentoacademico');
        
        $role->givePermissionTo('create categoriadocente');
        $role->givePermissionTo('read categoriadocente');
        $role->givePermissionTo('update categoriadocente');
        $role->givePermissionTo('delete categoriadocente');
        
        $role->givePermissionTo('create docentes');
        $role->givePermissionTo('read docentes');
        $role->givePermissionTo('update docentes');
        $role->givePermissionTo('delete docentes');
        
        $role->givePermissionTo('create comitestudiantil');
        $role->givePermissionTo('read comitestudiantil');
        $role->givePermissionTo('update comitestudiantil');
        $role->givePermissionTo('delete comitestudiantil');
        
        $role->givePermissionTo('create alumnos');
        $role->givePermissionTo('read alumnos');
        $role->givePermissionTo('update alumnos');
        $role->givePermissionTo('delete alumnos');
        
        $role->givePermissionTo('create temainvestigacion');
        $role->givePermissionTo('read temainvestigacion');
        $role->givePermissionTo('update temainvestigacion');
        $role->givePermissionTo('delete temainvestigacion');
        
        $role->givePermissionTo('create publicaciones');
        $role->givePermissionTo('read publicaciones');
        $role->givePermissionTo('update publicaciones');
        $role->givePermissionTo('delete publicaciones');
        
        $role->givePermissionTo('create tipo publicacion');
        $role->givePermissionTo('read tipo publicacion');
        $role->givePermissionTo('update tipo publicacion');
        $role->givePermissionTo('delete tipo publicacion');

        $role->givePermissionTo('update estilos');

    
        //Creacion de usuario y asignacion de roles al usuario admin
        $role = Role::create(['name'=>'super-admin']);
        $role->givePermissionTo (Permission::all());
    }
}
