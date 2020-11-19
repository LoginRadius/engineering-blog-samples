using System;
using System.Collections.Generic;
using System.Net;
using System.Net.Mail;

namespace MailUtility
{
    public static class Mail
    {
        //Method for sending an email
        public static Tuple<bool, string> SendEMail(MailArguments mailArgs, List<Attachment> attachments, bool isSsl, Dictionary<string, string> headers)
        {
            try
            {
                var networkCredential = new NetworkCredential
                {
                    Password = mailArgs.Password,
                    UserName = mailArgs.MailFrom
                };

                var mailMsg = new MailMessage
                {
                    Body = mailArgs.Message,
                    Subject = mailArgs.Subject,
                    IsBodyHtml = true // This indicates that message body contains the HTML part as well.
                };
                mailMsg.To.Add(mailArgs.MailTo);


                if (headers.IsNotNullOrEmpty() )
                {
                    foreach (var header in headers)
                    {
                        mailMsg.Headers.Add(header.Key, header.Value);
                    }
                }

                if (mailArgs.Bcc.IsNotNullOrEmptyOrWhiteSpace())
                {
                    string[] bccIds = mailArgs.Bcc.Split(',');
                    if (bccIds.IsNotNullOrEmpty())
                    {
                        foreach (var bcc in bccIds)
                        {
                            mailMsg.Bcc.Add(bcc);
                        }
                    }
                }

                if (attachments.IsNotNull())
                {
                    foreach (var attachment in attachments)
                    {
                        if (attachment.IsNotNull())
                        {
                            mailMsg.Attachments.Add(attachment);
                        }
                    }
                }

                mailMsg.From = new MailAddress(mailArgs.MailFrom, mailArgs.Name);

                var smtpClient = new SmtpClient(mailArgs.SmtpHost)
                {
                    Port = Convert.ToInt32(mailArgs.Port),
                    EnableSsl = isSsl,
                    DeliveryMethod = SmtpDeliveryMethod.Network,

                    UseDefaultCredentials = false,

                    Credentials = networkCredential
                };

                smtpClient.Send(mailMsg);
                return Tuple.Create(true, "Email Sent Successfully.");
            }
            catch (Exception ex)
            {
                var msg = ex.Message;
                return Tuple.Create(false, msg);
            }
        }
    }
}
