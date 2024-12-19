#include <iostream>
#include <map>
#include <string>

using namespace std;

int main() {
    map<string, string> country_code_To_country_name;

    country_code_To_country_name["IN"] = "India";
    country_code_To_country_name["US"] = "United States";
    country_code_To_country_name["NZ"] = "New Zealand";
    country_code_To_country_name["CA"] = "Canada";
    country_code_To_country_name["AU"] = "Australia";
    country_code_To_country_name["GB"] = "United Kingdom";

    string country_code;
    cout << "Enter the country code";
    cin >> country_code;

    bool is_country_found = false;
    for (const auto& country_pair : country_code_To_country_name) {
        if (country_pair.first == country_code) {
            cout << country_pair.second << endl;
            is_country_found = true;
            break;        }
    }

    if (!countryCodeFound) {
        cout << "Invalid country code entered" << endl;
    }

    return 0;
}