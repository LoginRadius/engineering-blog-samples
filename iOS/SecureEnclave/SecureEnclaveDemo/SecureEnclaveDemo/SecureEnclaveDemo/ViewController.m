//
//  ViewController.m
//   SecureEnclaveDemo
//
//  Created by Tanvi Jain on 2020-09-18.
//  Copyright © 2020 Tanvi Jain. All rights reserved.
//

#import "ViewController.h"
#import "SecEnclaveWrapper.h"

@interface ViewController ()

@end

@implementation ViewController

- (void)viewDidLoad {
    [super viewDidLoad];
    NSString *strDatatosave = @"example data to save";
    NSString *bundleIdentifier = [[NSBundle mainBundle] bundleIdentifier];
    NSString *strGroupID = [NSString stringWithFormat:@"group.%@",bundleIdentifier];
    SecEnclaveWrapper *keychainItem = [[SecEnclaveWrapper alloc] init];
    
    NSData *encrypted = [keychainItem encryptData:[strDatatosave dataUsingEncoding:NSUTF8StringEncoding]];
    NSString *strEncrypted = [[NSString alloc] initWithData:encrypted encoding:NSUTF8StringEncoding];
    NSLog(@"encrypted string %@",strEncrypted);
    
    NSData *decrypted =[keychainItem decryptData:encrypted];
    NSString *strDecrypted = [[NSString alloc] initWithData:decrypted encoding:NSUTF8StringEncoding];
    
    NSLog(@"decrrypted string as real string%@",strDecrypted);

}


@end
