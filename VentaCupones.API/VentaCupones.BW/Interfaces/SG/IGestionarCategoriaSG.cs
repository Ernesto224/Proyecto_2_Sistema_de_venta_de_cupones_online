using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace VentaCupones.BW.Interfaces.SG
{
    public interface IGestionarCategoriaSG
    {
        public Task<IEnumerable> ObtenerCategorias();
    }
}
