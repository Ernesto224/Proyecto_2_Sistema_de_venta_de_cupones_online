using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BW.Interfaces.DA;
using VentaCupones.DA.Contexto;
using VentaCupones.DA.Entidades;

namespace VentaCupones.DA.Acciones
{
    public class GestionarDetalleCompraDA : IGestionarDetalleCompraDA
    {
        private readonly ContextoVentaCupones contextoVentaCupones;

        public GestionarDetalleCompraDA(ContextoVentaCupones contextoVentaCupones)
        {
            this.contextoVentaCupones = contextoVentaCupones;
        }

        public async Task<bool> RegistrarDetalleCompra(DetalleCompra detalleCompra)
        {
            //se crea una nueva entidad de base de datos
            var detalleCompraDA = new DetallesCompraDA() {
                IDCompra = detalleCompra.IDCompra,
                IDCupon = detalleCompra.IDCupon,
                ImagenCupon = detalleCompra.ImagenCupon,
                UbicacionCupon = detalleCompra.UbicacionCupon,
                NombreEmpresa = detalleCompra.NombreEmpresa,
                Cantidad = detalleCompra.Cantidad,
                Precio = detalleCompra.Precio,
            };

            //se agrega la entidad al catalogo de detalles de compra
            await this.contextoVentaCupones.detallesCompras.AddAsync(detalleCompraDA);

            //se guardan los cambios
            var resultadoOperacion = await this.contextoVentaCupones.SaveChangesAsync();

            //se verifica si se pudieron guradar los cambios de forma exitosa
            if (resultadoOperacion > 0)
            {
                return true;
            }

            return false;
        }
    }
}
