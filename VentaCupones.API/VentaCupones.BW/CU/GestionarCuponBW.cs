using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.SG;

namespace VentaCupones.BW.CU
{
    public class GestionarCuponBW : IGestionarCuponesBW
    {
        private readonly IGestionarCuponesSG gestionarCuponesSG;

        public GestionarCuponBW(IGestionarCuponesSG gestionarCuponesSG)
        {
            this.gestionarCuponesSG = gestionarCuponesSG;
        }

        public async Task<IEnumerable> GestionarCupones(int idCategoria, string termino, int pagina)
        {
            return await this.gestionarCuponesSG.GestionarCupones(idCategoria, termino, pagina);
        }
    }
}
