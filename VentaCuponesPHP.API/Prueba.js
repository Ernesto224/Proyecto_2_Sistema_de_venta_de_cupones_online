const urlBase = 'http://localhost/VentaCuponesPHP.API/Presentation';

const obtenerCuponPorId = async (id) => {
    try {
        const response = await fetch(`${urlBase}/CuponLecturaController.php?id=${id}`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener el cupón: ' + response.statusText);
        }
        const cupon = await response.json();
        console.log(cupon);
    } catch (error) {
        console.error('Error al obtener el cupón:', error);
    }
}

const obtenerTodosLosCupones = async () => {
    try {
        const response = await fetch(`${urlBase}/CuponLecturaController.php`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener los cupones: ' + response.statusText);
        }
        const cupones = await response.json();
        console.log(cupones);
    } catch (error) {
        console.error('Error al obtener los cupones:', error);
    }
}


// Funciones para Empresas
const obtenerEmpresaPorId = async (id) => {
    try {
        const response = await fetch(`${urlBase}/EmpresaLecturaController.php?id=${id}`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener la empresa: ' + response.statusText);
        }
        const empresa = await response.json();
        console.log(empresa);
    } catch (error) {
        console.error('Error al obtener la empresa:', error);
    }
}

const obtenerTodasLasEmpresas = async () => {
    try {
        const response = await fetch(`${urlBase}/EmpresaLecturaController.php`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener las empresas: ' + response.statusText);
        }
        const empresas = await response.json();
        console.log(`${urlBase}/EmpresaLecturaController.php`);
        console.log(empresas);
    } catch (error) {
        console.error('Error al obtener las empresas:', error);
    }
}

const crearEmpresa = async (empresaData) => {
    try {
        const response = await fetch(`${urlBase}/EmpresaModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ ...empresaData, METHOD: 'POST' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al crear la empresa: ' + response.statusText);
        }
        const nuevaEmpresa = await response.json();
        console.log('Empresa creada:', nuevaEmpresa);
    } catch (error) {
        console.error('Error al crear la empresa:', error);
    }
}

const actualizarEmpresa = async (empresaData) => {
    try {
        const response = await fetch(`${urlBase}/EmpresaModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ ...empresaData, METHOD: 'PUT' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al actualizar la empresa: ' + response.statusText);
        }
        const empresaActualizada = await response.json();
        console.log('Empresa actualizada:', empresaActualizada);
    } catch (error) {
        console.error('Error al actualizar la empresa:', error);
    }
}

const eliminarEmpresa = async (id) => {
    try {
        const response = await fetch(`${urlBase}/EmpresaModificarController.php?IDEmpresa=${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ METHOD: 'DELETE' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al eliminar la empresa: ' + response.statusText);
        }
        const mensaje = await response.json();
        console.log('Mensaje del servidor:', mensaje);
    } catch (error) {
        console.error('Error al eliminar la empresa:', error);
    }
}

// Ejemplo de cómo llamar a las funciones
const empresaData = {
    NombreEmpresa: 'Nueva Empresa',
    DireccionFisica: 'Calle Principal 123',
    CedulaFisicaJuridica: '123456789',
    FechaCreacion: '2024-05-30',
    CorreoElectronico: 'empresa@nueva.com',
    Telefono: '555-1234',
    NombreUsuario: 'JESNER ELICER',
    Contrasenia: 'contrasenia123',
    Habilitado: 1
};

const idEmpresaActualizar = 1; // ID de la empresa que deseas actualizar
const idEmpresaEliminar = 2; // ID de la empresa que deseas eliminar

const urlBase1 = 'http://localhost/VentaCuponesPHP.API/Presentation/CuponModificarController.php';
const crearCupon = async (cuponData) => {
    try {
        const response = await fetch(`${urlBase}/CuponModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ ...cuponData, METHOD: 'POST' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al crear el cupón: ' + response.statusText);
        }
        const nuevoCupon = await response.json();
        console.log('Cupón creado:', nuevoCupon);
    } catch (error) {
        console.error('Error al crear el cupón:', error);
    }
}

const actualizarCupon = async (cuponData) => {
    try {
        const response = await fetch(`${urlBase}/CuponModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ ...cuponData, METHOD: 'PUT' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al actualizar el cupón: ' + response.statusText);
        }
        const cuponActualizado = await response.json();
        console.log('Cupón actualizado:', cuponActualizado);
    } catch (error) {
        console.error('Error al actualizar el cupón:', error);
    }
}

const eliminarCupon = async (id) => {
    try {
        const response = await fetch(`${urlBase}/CuponModificarController.php?IDCupon=${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ METHOD: 'DELETE' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al eliminar el cupón: ' + response.statusText);
        }
        const mensaje = await response.json();
        console.log('Mensaje del servidor:', mensaje);
    } catch (error) {
        console.error('Error al eliminar el cupón:', error);
    }
}



// Ejemplo de cómo llamar a las funciones
const cuponData = {
    Nombre: 'Nuevo Cupon',
    Imagen: 'imagen.jpg',
    Ubicacion: 'Lugar XYZ',
    PrecioCupon: 100,
    IDEmpresa: 1,
    IDCategoria: 1,
    Habilitado: 1
};

const cuponDataActualizar = {
    IDCupon: 1, // ID del cupón que deseas actualizar
    Nombre: 'Actualizado',
    Imagen: 'imagen.jpg',
    Ubicacion: 'Lugar XYZ',
    PrecioCupon: 100,
    IDEmpresa: 1,
    IDCategoria: 1,
    Habilitado: 1
};
const urlBase2 = 'http://localhost/VentaCuponesPHP.API/Presentation/CategoriaCuponModificarController.php';
const crearCategoriaCupon = async (categoriaData) => {
    try {
        const response = await fetch(`${urlBase}/CategoriaCuponModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ ...categoriaData, METHOD: 'POST' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al crear la categoría de cupón: ' + response.statusText);
        }
        const nuevaCategoria = await response.json();
        console.log('Categoría de cupón creada:', nuevaCategoria);
    } catch (error) {
        console.error('Error al crear la categoría de cupón:', error);
    }
}

const actualizarCategoriaCupon = async (categoriaData) => {
    try {
        const response = await fetch(`${urlBase}/CategoriaCuponModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ ...categoriaData, METHOD: 'PUT' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al actualizar la categoría de cupón: ' + response.statusText);
        }
        const mensaje = await response.json();
        console.log('Mensaje del servidor:', mensaje);
    } catch (error) {
        console.error('Error al actualizar la categoría de cupón:', error);
    }
}

// No es necesario enviar el ID de la categoría para eliminarla, solo el método
// Método para eliminar una categoría de cupón por su ID
const eliminarCategoriaCupon = async (id) => {
    try {
        const response = await fetch(`${urlBase}/CategoriaCuponModificarController.php?IDCategoria=${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ METHOD: 'DELETE' })
        });
        if (!response.ok) {
            throw new Error('Hubo un problema al eliminar la categoría de cupón: ' + response.statusText);
        }
        const mensaje = await response.json();
        console.log('Mensaje del servidor:', mensaje);
    } catch (error) {
        console.error('Error al eliminar la categoría de cupón:', error);
    }
}


// Método para obtener una categoría de cupón por su ID
const urlBase3 = 'http://localhost/VentaCuponesPHP.API/Presentation/CategoriaCuponLecturaController.php';
// Método para obtener una categoría de cupón por su ID
const obtenerCategoriaPorId = async (id) => {
    try {
        const response = await fetch(`${urlBase}/CategoriaCuponLecturaController.php?id=${id}`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener la categoría de cupón: ' + response.statusText);
        }
        const categoria = await response.json();
        console.log('Categoría de cupón:', categoria);
    } catch (error) {
        console.error('Error al obtener la categoría de cupón:', error);
    }
}

// Método para obtener todas las categorías de cupón
const obtenerTodasLasCategorias = async () => {
    try {
        const response = await fetch(`${urlBase}/CategoriaCuponLecturaController.php`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener todas las categorías de cupón: ' + response.statusText);
        }
        const categorias = await response.json();
        console.log('Todas las categorías de cupón:', categorias);
    } catch (error) {
        console.error('Error al obtener todas las categorías de cupón:', error);
    }
}

const obtenerTodasLasPromociones = async (id) => {
    try {
        const response = await fetch(`${urlBase}/PromocionLecturaController.php?id=${id}`);
        if (!response.ok) {
            throw new Error('Hubo un problema al obtener todas las promociones: ' + response.statusText);
        }
        const promociones = await response.json();
        console.log('Todas las promociones:', promociones);
    } catch (error) {
        console.error('Error al obtener todas las promociones:', error);
    }
}

