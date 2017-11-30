# Address Trimmer

## Problem Statement

On e-commerce business, customer address is one of important data in order for us to successfully deliver the order and we   never   know   whether   customer   address   is   shippable   or   not.

Our Warehouse Management System (WMS) fulfills orders from magento (e-commerce) and also talks DHL, which is one of   our   shipping   courier   /   3rd   party   logistic   (3PL)   to   deliver   the   customer   orders.

Currently,   DHL   provides   Shipping   API   that   helps   us   to   submit   shipping   /   consignment   information   to   their   end.

However, there is a limitation on DHL API that it only accepts customer address with 3 lines of address and each line is
limited   to   30   characters   length.   Otherwise,   DHL   API   will   reject   the   submission.

For   your   illustration,   customer   A   submitted   an   address   only   in   one   line   and   it   exceeds   30   characters   length.


```
Address1 : Business Office, Malcolm Long 92911 Proin Road Lake Charles Maine (length :   65)
Address2   :
Address3   :
```


But   DHL   will   accept   above   address   as   below   :

```
Address1   :Business   Office,   Malcolm   Long 
Address2   :92911   Proin   Road   Lake   Charles 
Address3   :Maine
```

### TASK

Based on issue above, we would like to know how would you provide an API, that validates such problematic address and the API will return an acceptable address format by DHL. You may use any framework as you wanted (Laravel / Lumen is preferable)
