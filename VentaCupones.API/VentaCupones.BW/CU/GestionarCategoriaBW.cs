using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.SG;

namespace VentaCupones.BW.CU
{
    public class GestionarCategoriaBW : IGestionarCategoriaBW
    {
        private readonly IGestionarCategoriaSG gestionarCategoriaSG;

        public GestionarCategoriaBW(IGestionarCategoriaSG gestionarCategoriaSG)
        {
            this.gestionarCategoriaSG = gestionarCategoriaSG;
        }

        public async Task<IEnumerable> ObtenerCategorias()
        {
            return await this.gestionarCategoriaSG.ObtenerCategorias();
        }
    }
}
