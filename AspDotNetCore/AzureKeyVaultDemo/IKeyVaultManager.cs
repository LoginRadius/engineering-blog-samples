using System.Threading.Tasks;

namespace AzureKeyVaultDemo
{
    public interface IKeyVaultManager
    {
        public Task<string> GetSecret(string secretName);
    }
}
