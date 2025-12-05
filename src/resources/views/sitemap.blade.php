{!! '<' . '?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($urls as $u)
        <url>
            <loc>{{ $u }}</loc>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($newsItems as $item)
        <url>
            <loc>{{ url('/news/' . $item->id) }}</loc>
            <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

</urlset>