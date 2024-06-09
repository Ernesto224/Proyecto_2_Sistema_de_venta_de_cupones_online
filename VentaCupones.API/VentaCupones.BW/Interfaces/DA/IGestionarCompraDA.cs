using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.DA.Entidades;

namespace VentaCupones.BW.Interfaces.DA
{
    public interface IGestionarCompraDA
    {
        public Task<int> RegistrarCompra(Compra compraNueva);

        public Task<IEnumerable> ObtenerCompras(int idUsuarioCliente);
    }
}
