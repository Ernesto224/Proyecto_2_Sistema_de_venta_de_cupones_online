using Microsoft.EntityFrameworkCore;
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
    public class GestionarCompraDA : IGestionarCompraDA
    {
        private readonly ContextoVentaCupones contextoVentaCupones;

        public GestionarCompraDA(ContextoVentaCupones contextoVentaCupones)
        {
            this.contextoVentaCupones = contextoVentaCupones;
        }

        public async Task<IEnumerable<Compra>> ObtenerCompras(int idUsuarioCliente)
        {
            //se solicita la informacion de todas las compras de el usuario segun su id
            //y gracias a las propiedades de navegacion de MEFW, se puede utilizar el metodo 
            //include para optener todos los detalles asociados a una compra
            var compras = await contextoVentaCupones.compras
              .Include(compra => compra.DetallesCompras)
              .Where(compra => compra.IDCliente == idUsuarioCliente)
              .Select(compraDA => new Compra(){
                  IDCompra = compraDA.IDCompra,
                  IDCliente = compraDA.IDCliente,
                  FechaDeCompra = compraDA.FechaDeCompra,
                  PrecioTotal = compraDA.PrecioTotal,
                  NombreTarjetaHabiente = compraDA.NombreTarjetaHabiente,
                  PAN = compraDA.PAN,
                  DetallesCompras = compraDA.DetallesCompras.Select(detalleDA => new DetalleCompra
                  {
                      IDDetalle = detalleDA.IDDetalle,
                      IDCompra = detalleDA.IDCompra,
                      IDCupon = detalleDA.IDCupon,
                      Cantidad = detalleDA.Cantidad,
                      Precio = detalleDA.Precio
                  }).ToList()
              }).ToListAsync();

            return compras;
        }

        public async Task<int> RegistrarCompra(Compra compraNueva)
        {
            //se crea un objeto compra para ser ingresado en la base de datos
           var compraDA = new CompraDA(){
               IDCliente = compraNueva.IDCliente,
               FechaDeCompra = compraNueva.FechaDeCompra,
               PrecioTotal = compraNueva.PrecioTotal,
               NombreTarjetaHabiente = compraNueva.NombreTarjetaHabiente,
               PAN = compraNueva.PAN,
           };

            //se agrega la compra al catalogo de compras
            await this.contextoVentaCupones.compras.AddAsync(compraDA);

            //se guardan los cambios en la base de datos
            var resultadoOperacion = await this.contextoVentaCupones.SaveChangesAsync();

            //en caso de una operacion correcta se retorna el id de la compra
            if (resultadoOperacion > 0)
            {
                return compraDA.IDCompra;
            }

            return -1;
        }
    }
}
