using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace VentaCupones.BC.Modelos
{
    public class Cupon
    {
        public int IDCupon { get; set; }

        public string Nombre { get; set; }

        public string Imagen { get; set; }

        public string Ubicacion { get; set;}

        public decimal PrecioCuponBase { get; set; }
        
        public decimal PrecioCuponVenta { get; set; }

        public DateTime FechaVenciminetoOferta { get; set; }

        public int IDEmpresa {  get; set; }
        
        public int IDCategoria { get; set; }
    }
}
