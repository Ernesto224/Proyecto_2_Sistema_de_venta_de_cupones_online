using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BW.Interfaces.BW;

namespace VentaCupones.BW.CU
{
    public class CifradoRSA : ICifradoBW
    {
        public string Decrypt(string encrypted)
        {
            throw new NotImplementedException();
        }
    }
}
