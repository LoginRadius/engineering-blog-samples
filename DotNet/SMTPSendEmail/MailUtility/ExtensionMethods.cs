using System.Collections.Generic;
using System.Linq;

namespace MailUtility
{
    public static class ExtensionMethods
    {
        public static bool IsNotNullOrEmpty<T>(this IEnumerable<T> value)
        {
            return value != null && value.Any(); // This will return true if the value is not null and not empty
        }
        public static bool IsNotNullOrEmptyOrWhiteSpace(this string value)
        {
            return !(string.IsNullOrEmpty(value) || string.IsNullOrWhiteSpace(value)); // This will return true if the string value is not null, not empty and not contains any white space
        }
        public static bool IsNotNull(this object value)
        {
            return value != null; // This will return true if the object value is not null
        }
    }
}
