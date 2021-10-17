# TestLogs
# Obtain iOS application logs for testing without Mac/cable/Xcode

Let's say we have developed an iOS app. As in many situations, we want to test our app on another's phone for many reasons. And probably that phone cannot be connected to the Mac. So those logs can be sent directly via the app to the developer(us).

This repository will provide step-by-step instructions for mailing iOS app logs directly from the app . 

In the repository there is a project with a single ViewController. We may ask our users to install the app on their device, use it and at the end click on buttonSendLog Button. IBAction pressForLogs
Function will get called which will open MailComposer and then the user can send mail to us containing all app logs.

Follow the steps to get logs by mail into your app :

Find AppDelegate.swift in your project. Define following var and function before any import statement as global.
public var logFilePath:String!
 
    func print(_ items: Any..., separator: String = " ", terminator: String = "\n") {
    let output = items.map { "*\($0)"}.joined(separator: " ")
    //Swift.print(output, terminator: terminator)
    NSLog(output)
    }
 
Above function override any logs in the app.

Then define following method in AppDelegate.Swift file. And call from   func application(_ application: UIApplication, didFinishLaunchingWithOptions launchOptions: [UIApplication.LaunchOptionsKey: Any]?) -> Bool function.

    func printTheDataAtLogFile() {
    logFilePath = NSTemporaryDirectory().appending(String.init(format: "%@.log",Bundle.main.object(forInfoDictionaryKey: "CFBundleName") as! String)) as String
       freopen((logFilePath as NSString).cString(using: String.Encoding(rawValue: String.Encoding.ascii.rawValue).rawValue)!, "a+", stderr)
    }
Above function will write all logs in a file.

Then open Viewcontroller.swift. Define below 2 functions in it. 


      func allOptions() {
        let alert = UIAlertController(title: "Please Select an Option", message: nil, preferredStyle: .actionSheet)
        
        alert.addAction(UIAlertAction(title: "Log Mail", style: .default , handler:{ (UIAlertAction)in
            self.shareDocument(documentPath: logFilePath)
        }))
        
        alert.addAction(UIAlertAction(title: "dismis", style: .cancel, handler:{ (UIAlertAction)in
            print("User click Dismiss button")
        }))

        self.present(alert, animated: true, completion: {
            print("completion block")
        })
    }

  //  ============================= //
 
    // this is to share file //
    func shareDocument(documentPath: String) {
        if FileManager.default.fileExists(atPath: documentPath){
            let fileURL = URL(fileURLWithPath: documentPath)
            let activityViewController: UIActivityViewController = UIActivityViewController(activityItems: [fileURL], applicationActivities: nil)
            activityViewController.popoverPresentationController?.sourceView=self.view
            present(activityViewController, animated: true, completion: nil)
        }
        else {
            print("Document was not found")
        }
    }
Call allOptions() from IBAction pressForLogs. Above functions will open ActivityViewContrrolle to let the user mail log file to you.


Voila!

For more information visit our ![documentation](https://www.loginradius.com/engineering/blog/how-to-obtain-ios-application-logs-without-mac/)
You may also refer to our Youtube Video for better understanding ![Video](https://www.youtube.com/watch?v=KTnFtIvoDiI)
