using Azure.Security.KeyVault.Secrets;
using System.Threading.Tasks;

namespace AzureKeyVaultDemo
{
    public class KeyVaultManager: IKeyVaultManager
    {
        private readonly SecretClient _secretClient;
        public KeyVaultManager(SecretClient secretClient)
        {
            _secretClient = secretClient;
        }

        public async Task<string> GetSecret(string secretName)
        {
            try
            {
                KeyVaultSecret keyValueSecret = await _secretClient.GetSecretAsync(secretName);
                return keyValueSecret.Value;
            }
            catch
            {
                throw;
            }
        }
    }
}
