const uriPromocion = 'http://localhost/VentaCuponesPHP.API/Presentation/PromocionModificarController.php';

async function registrarPromocion(promocion) {
    const response = await fetch(uriPromocion, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body:  new URLSearchParams({
            METHOD: 'POST',
            ...promocion
        })
    });
    const data = await response.json();
    console.log('Promoción registrada:', data);
}

async function actualizarPromocion(promocion) {
    const response = await fetch(uriPromocion, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            METHOD: 'PUT',
            ...promocion
        })
    });
    const data = await response.json();
    console.log('Promoción actualizada:', data);
}

async function eliminarPromocion(idPromocion) {
    const response = await fetch(uriPromocion, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            METHOD: 'DELETE',
            IDPromocion: idPromocion,
            Estado: 0
        })
    });
    const data = await response.json();
    console.log('Promoción eliminada:', data);
}

async function verificar() {
    const response = await fetch('http://localhost/VentaCuponesPHP.API/Presentation/UsuarioAdminLecturaController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            METHOD: 'POST',
            NombreUsuario: "admin1",
            Contrasenia: "contrasenia1"
        })
    });
    const data = await response.json();
    console.log('Promoción eliminada:', data);
}


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
        const response = await fetch(`${urlBase}/EmpresaModificarController.php?`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ METHOD: 'DELETE', IDEmpresa: id, Estado: 0 })
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

const habilitarCupon= async (id) => {
    try {
        const response = await fetch(`${urlBase}/CuponModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ METHOD: 'DELETE', IDCupon: id, Estado: 1 })
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

const eliminarCupon = async (id) => {
    try {
        const response = await fetch(`${urlBase}/CuponModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ METHOD: 'DELETE',  IDCupon: id, Estado: 0 })
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


const urlBase2 = 'http://localhost/VentaCuponesPHP.API/Presentation';

const crearCategoriaCupon = async (categoriaData) => {
    try {
        const response = await fetch(`${urlBase2}/CategoriaCuponModificarController.php`, {
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
        const response = await fetch(`${urlBase2}/CategoriaCuponModificarController.php`, {
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


const urlBase3 = 'http://localhost/VentaCuponesPHP.API/Presentation/CategoriaCuponLecturaController.php';

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