<div class="mb-3">
            <label for="usu_name" class="form-label">Usuario</label>
            <input type="text" id="name" placeholder="UserName" value="{{ isset($user)?$user->usu_name:''}}" name="name" class="form-control">

            <label for="rol_id" class="form-label">Rol</label>
            <select id="rol_id" name="rol_id" class="form-control">
            @foreach($roles as $rol)
            <option value="{{ $rol->rol_id }}" {{ isset($user) && $user->rol_id == $rol->id ? 'selected' : '' }}>
            {{ $rol->rol_descripcion }}
            </option>
            @endforeach
            </select>

            <label for="usu_nombres" class="form-label">Nombre</label>
            <input type="text" id="usu_nombres" placeholder="Nombre" value="{{ isset($user)?$user->usu_nombres:''}}"  name="usu_nombres" class="form-control">

            <label for="email" class="form-label">Correo</label>
            <input type="text" id="email"  placeholder="Correo" value="{{ isset($user)?$user->email:''}}" name="email" class="form-control">
            
            <label for="email" class="form-label">Contraseña</label>
            <input type="text" id="password"  placeholder="contraseña" value="{{ isset($user)?$user->password:''}}" name="password" class="form-control">
            
            <label for="email" class="form-label">telefono</label>
            <input type="text" id="usu_telefono"  placeholder="Telefono" value="{{ isset($user)?$user->usu_telefono:''}}" name="usu_telefono" class="form-control">
            

        </div>
        <button type="" class="btn btn-info">Guardar</button>
