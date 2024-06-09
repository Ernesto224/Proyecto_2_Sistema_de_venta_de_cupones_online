using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;

namespace VentaCupones.BW.Interfaces.BW
{
    public interface IGestionarCuponesBW
    {
        public Task<IEnumerable> GestionarCupones(int idCategoria, string termino, int pagina);
    }
}
