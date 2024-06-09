using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace VentaCupones.BW.Interfaces.BW
{
    public interface IGestionarCategoriaBW
    {
        public Task<IEnumerable> ObtenerCategorias();
    }
}
