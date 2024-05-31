const urlBase = 'http://127.0.0.1/MelgaraMurilloJesnerVegaRodriguezErnesto_C14644_C08380_ProyectoII_IF4101/Presentation';

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
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ...empresaData, METHOD: 'POST' })
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
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ...empresaData, METHOD: 'PUT' })
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
        const response = await fetch(`${urlBase}/EmpresaModificarController.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ METHOD: 'DELETE', IDEmpresa: id })
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
    Contrasenia: 'contrasenia123',
    Habilitado: 1
};

const idEmpresaActualizar = 1; // ID de la empresa que deseas actualizar
const idEmpresaEliminar = 2; // ID de la empresa que deseas eliminar

obtenerEmpresaPorId(1);
obtenerTodasLasEmpresas();
crearEmpresa(empresaData);
actualizarEmpresa({ ...empresaData, IDEmpresa: idEmpresaActualizar });
eliminarEmpresa(idEmpresaEliminar);
