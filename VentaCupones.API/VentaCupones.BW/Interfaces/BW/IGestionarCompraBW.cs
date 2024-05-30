using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;
using VentaCupones.DA.Entidades;

namespace VentaCupones.BW.Interfaces.BW
{
    public interface IGestionarCompraBW
    {
        public Task<int> RegistrarCompra(Compra compraNueva);

        public Task<IEnumerable<Compra>> ObtenerCompras(int idUsuarioCliente);
    }
}
