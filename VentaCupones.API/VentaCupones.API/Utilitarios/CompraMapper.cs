using VentaCupones.DA.Entidades;

namespace VentaCupones.API.Utilitarios
{
    public static class CompraMapper
    {
        public static CompraDTO MapToDTO(Compra compra)
        {
            return new CompraDTO
            {
                IDCompra = compra.IDCompra,
                FechaCompra = compra.FechaCompra,
                PrecioTotal = compra.PrecioTotal,
                DetallesCompras = compra.DetallesCompras.Select(d => DetallesMapper.MapToDTO(d)).ToList()
            };
        }

        public static Compra MapToModel(CompraRegistroDTO compraDTO)
        {
            return new Compra
            {
                IDUsuarioCliente = compraDTO.IDUsuarioCliente,
                FechaCompra = compraDTO.FechaCompra,
                PrecioTotal = compraDTO.PrecioTotal,
                NombreTarjetahabiente = compraDTO.NombreTarjetahabiente,
                PAN = compraDTO.PAN,
            };
        }

        public static IEnumerable<CompraDTO> MapToDTOs(IEnumerable<Compra> compras)
        {
            return compras.Select(c => MapToDTO(c)).ToList();
        }
    }
}
