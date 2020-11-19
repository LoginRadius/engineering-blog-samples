using System;
using System.Collections.Generic;
using System.Net.Mail;
using System.Net.Mime;
using MailUtility;

namespace EmailSendingUtility
{
    class Program
    {
        static void Main(string[] args)
        {
            var mailArgs = new MailArguments
            {
                MailFrom = "<--From mail address from where mail should be sent-->",
                Password = "<--From mail address password-->",
                Name = "<--From mail address name-->",
                MailTo = "<--To mail address to where mail should be received-->",
                Subject = "<--Subject of the email-->",
                Message = "<--Message body of the email can contains HTML as well-->",
                Port = 587,
                SmtpHost = "smtp.gmail.com",
                Bcc = "<--BCC email id's separated by semicolon (;)-->"
            };
            List<Attachment> lstAttachments = new List<Attachment>
            {
                new Attachment("<--Path of the attachment-->>",MediaTypeNames.Image.Gif) //MediaType and Path of the attachment here I have selected Gif Image we have MediaTypeNames Application/Image/Text
            };

            Dictionary<string, string> dictHeaders = new Dictionary<string, string>
            {
                { "<--Key of the header-->", "<--Values of the header-->" }
            };

            Console.WriteLine(Mail.SendEMail(mailArgs, lstAttachments, true, dictHeaders).Item2);
        }
    }
}
