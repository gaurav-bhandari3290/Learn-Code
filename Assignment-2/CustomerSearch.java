public class CustomerSearch
{
    public List<Customer> Search(string searchTerm, string searchField)
    {
        var query = from customer in database.customers where (searchField == "Country" && customer.Country.Contains(searchTerm)) || (searchField == "CompanyName" && customer.CompanyName.Contains(searchTerm)) || (searchField == "ContactName" && customer.ContactName.Contains(searchTerm)) orderby customer.CustomerID ascending select customer;
        return query.ToList();
    }

    public List<Customer> SearchByCountry(string country)
    {
        return Search(country, "Country");
    }

    public List<Customer> SearchByCompanyName(string company)
    {
        return Search(company, "CompanyName");
    }

    public List<Customer> SearchByContact(string contact)
    {
        return Search(contact, "ContactName");
    }
}

public class Export
{
    public string ExportToCSV(List<Customer> data)
    {
        StringBuilder csvString = new StringBuilder();
        foreach (var item in data)
        {
            csvString.AppendFormat("{0},{1},{2},{3}", item.CustomerID, item.CompanyName, item.ContactName, item.Country);
            csvString.AppendLine();
        }
        return csvString.ToString();
    }
}
