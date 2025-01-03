#include <iostream>
#include <fstream>
#include <string>
#include <map>
#include <utility>

using namespace std;

pair<string, string> extractCountryCodeAndName(const string& line) {
    string countryCode, countryName;

    int countryCodeStart = line.find("\"") + 1;
    int countryCodeEnd = line.find("\"", countryCodeStart);
    countryCode = line.substr(countryCodeStart, countryCodeEnd - countryCodeStart);
    
    int countryNameStart = line.find("\"", countryCodeEnd + 1) + 1;
    int countryNameEnd = line.find("\"", countryNameStart);
    countryName = line.substr(countryNameStart, countryNameEnd - countryNameStart);

    return make_pair(countryCode, countryName);
}

int main() {
    ifstream countryFile("countries.json");
    if (!countryFile) {
        cerr << "Error: Unable to open the JSON file." << endl;
        return 1;
    }

    map<string, string> countryCodeToCountryName;
    
    string fileLine;

    while (getline(countryFile, fileLine)) {
        if (fileLine.find("\"") != string::npos) {
            pair<string, string> countryPair = extractCountryCodeAndName(fileLine);
            countryCodeToCountryName[countryPair.first] = countryPair.second;
        }
    }

    countryFile.close();

    string inputCountryCode;
    cout << "Enter the country code: ";
    cin >> inputCountryCode;

    if (countryCodeToCountryName.count(inputCountryCode)) {
        cout << "Country: " << countryCodeToCountryName[inputCountryCode] << endl;
    } else {
        cout << "Invalid country code entered." << endl;
    }

    return 0;
}