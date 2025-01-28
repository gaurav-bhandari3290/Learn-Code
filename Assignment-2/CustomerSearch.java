public class CustomerSearch
    {
    public List < Customer > SearchByCountry(string country)
    {
        var query = from customer in database.customers where customer.Country.Contains(country) orderby customer.CustomerID ascending select customer;
        return query.ToList();
    }

    public List < Customer > SearchByCompanyName(string company)
    {
        var query = from customer in database.customers where customer.Country.Contains(company) orderby customer.CustomerID ascending select customer;
        return query.ToList();
    }

    public List < Customer > SearchByContact(string contact)
    {
        var query = from customer in database.customers where customer.Country.Contains(contact) orderby customer.CustomerID ascending select customer;
        return query.ToList();
    }
}

public class ExportCSV
{
    public string ExportToCSV(List < Customer > data)
    {
        StringBuilder csvString = newStringBuilder();
        foreach(var item in data)
        {
            csvString.AppendFormat("{0},{1}, {2}, {3}", item.CustomerID, item.CompanyName, item.ContactName, item.Country);
            csvString.AppendLine();
        }
        return csvString.ToString();
    }
}