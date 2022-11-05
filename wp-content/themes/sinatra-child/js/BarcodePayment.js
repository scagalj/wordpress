/**
 * BarcodeGenerator - 2D Barcode generator for Croatian payment(LGPLv3)
 * version: 0.502
 */
BarcodePayment = new function() {
	var _me = this;
	
	// Constants
	var _allowedSingleByteCharacters = [ "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", " ", ",", ".", ":", "-", "+", "?", "'", "/", "(", ")" ];
	var _allowedTwoByteCharacters = [ "Š", "Đ", "Č", "Ć", "Ž", "š", "đ", "č", "ć", "ž" ];
	var _allowedCharacters = jQuery.merge(jQuery.merge([], _allowedSingleByteCharacters), _allowedTwoByteCharacters);
	
	var _priceFieldLength = 15;
	var _pricePattern = "^[0-9]+,[0-9]{2}$";
	
	var _delimiter = String.fromCharCode(0x0A);
	var _header = "HRVHUB30";
//	var _currency = "EUR" Prebaciti u eure  izbrisati konverziju u iznosu!
	var _currency = "HRK"
	var _paymentModelPrefix = "HR";
	
	// Private variables
	var _settings;
	
	this.Defaults = {
		ValidateIBAN: false, // TODO: Implement IBAN validation
		ValidateModelPozivNaBroj: false // TODO: Implement callout number validation
	}
	
	// Public functions
	this.GetLength = function(str) {
		var len = 0;
		
		if (!StringNotDefinedOrEmpty(str)) {
			for (var i = 0; i < str.length; ++i) {
				var c = str[i];
				
				if (jQuery.inArray(c, _allowedTwoByteCharacters) > -1) {
					len += 2;
				} else if (jQuery.inArray(c, _allowedSingleByteCharacters) > -1) {
					len += 1;
				} else {
					return -1;
				}
			}
		}
		
		return len;
	}
	
	this.IsPaymentModelValid = function(paymentModel) {
		var isValid = true;
		return isValid;
	}
	
	this.IsCalloutNumberValid = function(calloutNumber, paymentModel) {
		var isValid = true;
		return isValid;
	}
	
	this.IsIntentCodeValid = function(intentCode) {
		var isValid = true;
		return isValid;
	}
	
	this.ValidatePaymentParams = function(paymentParams) {
		if (!(paymentParams instanceof(BarcodePayment.PaymentParams))) {
			return null;
		}
		
		var result = BarcodePayment.ValidationResult.OK;
		var fieldLength = -1;

		// Price
		fieldLength = _me.GetLength(paymentParams.Iznos);
		if (fieldLength > BarcodePayment.MaxLengths.Price) {
			result |= BarcodePayment.ValidationResult.PriceMaxLengthExceeded;
		}
	
		if (!StringNotDefinedOrEmpty(paymentParams.Iznos) && (fieldLength == -1 || paymentParams.Iznos.match(_pricePattern) == null)) {
			result |= BarcodePayment.ValidationResult.PricePatternInvalid;
		}
		
		// Payer name
		fieldLength = _me.GetLength(paymentParams.ImePlatitelja);
		if (fieldLength > BarcodePayment.MaxLengths.PayerName) {
			result |= BarcodePayment.ValidationResult.PayerNameMaxLengthExceeded;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.ImePlatitelja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.PayerNameInvalid;
		}
		
		// Payer address
		fieldLength = _me.GetLength(paymentParams.AdresaPlatitelja);
		if (fieldLength > BarcodePayment.MaxLengths.PayerAddress) {
			result |= BarcodePayment.ValidationResult.PayerAddressMaxLengthExceeded;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.AdresaPlatitelja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.PayerAddressInvalid;
		}
		
		// Payer HQ
		fieldLength = _me.GetLength(paymentParams.SjedistePlatitelja);
		if (fieldLength > BarcodePayment.MaxLengths.PayerHQ) {
			result |= BarcodePayment.ValidationResult.PayerHQMaxLengthExceeded;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.SjedistePlatitelja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.PayerHQInvalid;
		}
		
		// Receiver name
		fieldLength = _me.GetLength(paymentParams.Primatelj);
		if (fieldLength > BarcodePayment.MaxLengths.ReceiverName) {
			result |= BarcodePayment.ValidationResult.ReceiverNameMaxLengthExceeded;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.Primatelj) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.ReceiverNameInvalid;
		}
		
		// Receiver address
		fieldLength = _me.GetLength(paymentParams.AdresaPrimatelja);
		if (fieldLength > BarcodePayment.MaxLengths.ReceiverAddress) {
			result |= BarcodePayment.ValidationResult.ReceiverAddressMaxLengthExceeded;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.AdresaPrimatelja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.ReceiverAddressInvalid;
		}
		
		// Receiver HQ
		fieldLength = _me.GetLength(paymentParams.SjedistePrimatelja);
		if (fieldLength > BarcodePayment.MaxLengths.ReceiverHQ) {
			result |= BarcodePayment.ValidationResult.ReceiverHQMaxLengthExceeded;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.SjedistePrimatelja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.ReceiverHQInvalid;
		}
		
		// IBAN
		fieldLength = _me.GetLength(paymentParams.IBAN);
		if (fieldLength > BarcodePayment.MaxLengths.IBAN) {
			result |= BarcodePayment.ValidationResult.IBANMaxLengthExceeded;
		}
	
		if (!StringNotDefinedOrEmpty(paymentParams.IBAN) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.IBANInvalid;
		}
		
		if (_settings.ValidateIBAN && !StringNotDefinedOrEmpty(paymentParams.IBAN)) {
			result |= BarcodePayment.ValidationResult.IBANInvalid;
		}
		
		// Payment model
		fieldLength = _me.GetLength(paymentParams.ModelPlacanja);
		if (fieldLength > BarcodePayment.MaxLengths.PaymentModel) {
			result |= BarcodePayment.ValidationResult.PaymentModelMaxLengthExceeded;
		}
	
		if (!StringNotDefinedOrEmpty(paymentParams.ModelPlacanja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.PaymentModelInvalid;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.ModelPlacanja) && !_me.IsPaymentModelValid(paymentParams.ModelPlacanja)) {
			result |= BarcodePayment.ValidationResult.PaymentModelInvalid;
		}
		
		// Callout number
		fieldLength = _me.GetLength(paymentParams.PozivNaBroj);
		if (fieldLength > BarcodePayment.MaxLengths.CalloutNumber) {
			result |= BarcodePayment.ValidationResult.CalloutNumberMaxLengthExceeded;
		}
	
		if (!StringNotDefinedOrEmpty(paymentParams.PozivNaBroj) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.CalloutNumberInvalid;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.PozivNaBroj) && !_me.IsCalloutNumberValid(paymentParams.PozivNaBroj, paymentParams.ModelPlacanja)) {
			result |= BarcodePayment.ValidationResult.CalloutNumberInvalid;
		}
		
		// Intent code
		fieldLength = _me.GetLength(paymentParams.SifraNamjene);
		if (fieldLength > BarcodePayment.MaxLengths.IntentCode) {
			result |= BarcodePayment.ValidationResult.IntentCodeMaxLengthExceeded;
		}
	
		if (!StringNotDefinedOrEmpty(paymentParams.SifraNamjene) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.IntentCodeInvalid;
		}
		
		if (!StringNotDefinedOrEmpty(paymentParams.SifraNamjene) && !_me.IsIntentCodeValid(paymentParams.SifraNamjene)) {
			result |= BarcodePayment.ValidationResult.IntentCodeInvalid;
		}
		
		// Description
		fieldLength = _me.GetLength(paymentParams.OpisPlacanja);
		if (fieldLength > BarcodePayment.MaxLengths.Description) {
			result |= BarcodePayment.ValidationResult.DescriptionMaxLengthExceeded;
		}
	
		if (!StringNotDefinedOrEmpty(paymentParams.OpisPlacanja) && fieldLength == -1) {
			result |= BarcodePayment.ValidationResult.DescriptionInvalid;
		}
		
		return result;
	}
	
	this.GetEncodedText = function(paymentParams) {
		if (!(paymentParams instanceof(BarcodePayment.PaymentParams))) {
			return BarcodePayment.ResultCode.InvalidObject;
		}
		
		if (BarcodePayment.ValidatePaymentParams(paymentParams) != BarcodePayment.ValidationResult.OK) {
			return BarcodePayment.ResultCode.InvalidContent;
		}

		return ConcatenateStrings(
			_header, _delimiter,
			_currency, _delimiter,
			EncodePrice(paymentParams.Iznos), _delimiter,
			paymentParams.ImePlatitelja, _delimiter,
			paymentParams.AdresaPlatitelja, _delimiter,
			paymentParams.SjedistePlatitelja, _delimiter,
			paymentParams.Primatelj, _delimiter,
			paymentParams.AdresaPrimatelja, _delimiter,
			paymentParams.SjedistePrimatelja, _delimiter,
			paymentParams.IBAN, _delimiter,
			_paymentModelPrefix, paymentParams.ModelPlacanja, _delimiter,
			paymentParams.PozivNaBroj, _delimiter,
			paymentParams.SifraNamjene, _delimiter,
			paymentParams.OpisPlacanja, _delimiter
		);
	}
	
	// Private functions
	var PadLeft = function(str, len, pad) {
		while (str.length < len) {
			str = pad + str;
		}

		return str;
	}
	
	var StringNotDefinedOrEmpty = function(str) {
		return str == undefined || str == null || str.length == 0;
	}
	
	var EncodePrice = function(price) {
		var fullLength = 15;
		return PadLeft(price.replace(',', ''), fullLength, '0');
	}
	
	var ConcatenateStrings = function() {
		var res = '';
		
		for (var i = 0; i < arguments.length; ++i) {
			if (typeof(arguments[i]) != 'undefined') {
				res += arguments[i];
			}
		}
		
		return res;
	}
	
	this.AllowedSingleByteCharacters = jQuery.merge([], _allowedSingleByteCharacters);
	this.AllowedTwoByteCharacters = jQuery.merge([], _allowedTwoByteCharacters);
	this.AllowedCharacters = jQuery.merge([], _allowedCharacters);
	this.PricePattern = _pricePattern.substr(0);
	
	this.MaxLengths = {
		Price: 16,
		PayerName: 30,
		PayerAddress: 27,
		PayerHQ: 27,
		ReceiverName: 25,
		ReceiverAddress: 25,
		ReceiverHQ: 27,
		IBAN: 21,
		PaymentModel: 2,
		CalloutNumber: 22,
		IntentCode: 4,
		Description: 35
	}
	
	this.ResultCode = {
		OK: 0,
		InvalidObject: 1,
		InvalidContent: 2
	}
	
	this.ValidationResult = {
		OK: 0,
		
		PricePatternInvalid: 1,
		PriceMaxLengthExceeded: 2,
		
		PayerNameInvalid: 4,
		PayerNameMaxLengthExceeded: 8,
		
		PayerAddressInvalid: 16,
		PayerAddressMaxLengthExceeded: 32,
		
		PayerHQInvalid: 64,
		PayerHQMaxLengthExceeded: 128,
		
		ReceiverNameInvalid: 256,
		ReceiverNameMaxLengthExceeded: 512,
		
		ReceiverAddressInvalid: 1024,
		ReceiverAddressMaxLengthExceeded: 2048,
		
		ReceiverHQInvalid: 4096,
		ReceiverHQMaxLengthExceeded: 8192,
		
		IBANInvalid: 16384,
		IBANMaxLengthExceeded: 32768,
		
		PaymentModelInvalid: 65536,
		PaymentModelMaxLengthExceeded: 131072,
		
		CalloutNumberInvalid: 262144,
		CalloutNumberMaxLengthExceeded: 524288,
		
		IntentCodeInvalid: 1048576,
		IntentCodeMaxLengthExceeded: 2097152,
		
		DescriptionInvalid: 4194304,
		DescriptionMaxLengthExceeded: 8388608
	}
	
	this.PaymentParams = function () {
		this.Iznos = "";
		this.ImePlatitelja = "";
		this.AdresaPlatitelja = "";
		this.SjedistePlatitelja = "";
		this.Primatelj = "";
		this.AdresaPrimatelja = "";
		this.SjedistePrimatelja = "";
		this.IBAN = "";
		this.ModelPlacanja = "";
		this.PozivNaBroj = "";
		this.SifraNamjene = "";
		this.OpisPlacanja = "";
	}
	
	// Initialization method
	this.Init = function(settings) {
		_settings = jQuery.extend({}, BarcodePayment.Defaults, settings);
	}
}