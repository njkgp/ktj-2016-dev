from django import forms
from django.contrib.auth.models import User


class OrderForm(forms.Form):

    # cart order related fields
    txnid = forms.CharField()
    productinfo = forms.CharField()
    amount = forms.DecimalField(widget = forms.HiddenInput(), required = False ,decimal_places=2)

    # buyer details
    firstname = forms.CharField()
    lastname = forms.CharField(required=False)
    email = forms.EmailField()
    phone = forms.RegexField(regex=r'\d{10}', min_length=10, max_length=10)
    address1 = forms.CharField(required=False)
    address2 = forms.CharField(required=False)

    state = forms.CharField(required=False)
    country = forms.CharField(required=False)
    zipcode = forms.RegexField(regex=r'\d{6}', min_length=6, max_length=6, required=False)
    service_provider = forms.CharField(required=False)