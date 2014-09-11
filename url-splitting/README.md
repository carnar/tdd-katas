# URL splitting
We all know URLs, http://www.google.se is a popular one.

Develop a class that decomposes a given URL into its constituents. In the above example, we would like to get the result

1. The protocol: "http"
2. The domain name: "www.google.se"
3. The path: an empty string in our example.

Here are some example tests you could write to design this functionality:

1. "http://some.thing" should give protocol=="http"
2. "ftp://a.large.site" should give domain=="a.large.site"
3. "http://a.site.with/a-path" should give path=="a-path"