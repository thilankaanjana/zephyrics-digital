import { Link } from "react-router-dom";
import { Layout } from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { ArrowRight, Clock, User } from "lucide-react";

const blogPosts = [
  {
    id: 1,
    title: "10 Web Design Trends That Will Dominate 2024",
    excerpt: "Discover the latest design trends shaping the web and how to implement them in your projects.",
    category: "Web Design",
    readTime: "5 min read",
    date: "Jan 15, 2024",
  },
  {
    id: 2,
    title: "SEO Basics Every Business Owner Should Know",
    excerpt: "A beginner-friendly guide to understanding SEO and why it matters for your online presence.",
    category: "SEO",
    readTime: "7 min read",
    date: "Jan 10, 2024",
  },
  {
    id: 3,
    title: "Why Your Website Speed Matters More Than You Think",
    excerpt: "Learn how page speed impacts user experience, SEO rankings, and your bottom line.",
    category: "Performance",
    readTime: "4 min read",
    date: "Jan 5, 2024",
  },
  {
    id: 4,
    title: "The Power of Consistent Branding",
    excerpt: "How a cohesive brand identity can transform your business and build customer trust.",
    category: "Branding",
    readTime: "6 min read",
    date: "Dec 28, 2023",
  },
  {
    id: 5,
    title: "Landing Page Optimization: A Complete Guide",
    excerpt: "Practical tips to improve your landing page conversion rates and get more leads.",
    category: "Conversion",
    readTime: "8 min read",
    date: "Dec 20, 2023",
  },
  {
    id: 6,
    title: "Choosing the Right CMS for Your Business",
    excerpt: "WordPress, Webflow, or custom? We break down the options to help you decide.",
    category: "Development",
    readTime: "6 min read",
    date: "Dec 15, 2023",
  },
];

const Blog = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="pt-32 pb-16 bg-background relative overflow-hidden">
        <div className="absolute inset-0 hero-glow" />
        <div className="absolute inset-0 bg-grid-pattern bg-grid opacity-5" />
        
        <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto text-center">
            <span className="text-primary text-sm font-semibold uppercase tracking-wider">Blog & Insights</span>
            <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-foreground mt-4 mb-6">
              Digital Growth
              <span className="gradient-text"> Insights</span>
            </h1>
            <p className="text-xl text-muted-foreground leading-relaxed">
              Tips, guides, and strategies to help your business succeed online.
            </p>
          </div>
        </div>
      </section>

      {/* Blog Posts */}
      <section className="py-20 bg-card">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {blogPosts.map((post) => (
              <article
                key={post.id}
                className="group rounded-2xl bg-background border border-border hover:border-primary/30 overflow-hidden transition-all duration-300"
              >
                {/* Post Image Placeholder */}
                <div className="aspect-video bg-gradient-to-br from-primary/20 via-primary/10 to-transparent flex items-center justify-center">
                  <span className="text-5xl font-display font-bold text-primary/20">
                    {post.category[0]}
                  </span>
                </div>
                
                <div className="p-6">
                  <div className="flex items-center gap-4 mb-3">
                    <span className="text-xs font-medium text-primary bg-primary/10 px-2 py-1 rounded-full">
                      {post.category}
                    </span>
                    <span className="flex items-center gap-1 text-xs text-muted-foreground">
                      <Clock className="w-3 h-3" />
                      {post.readTime}
                    </span>
                  </div>
                  
                  <h2 className="font-display text-xl font-semibold text-foreground mb-2 group-hover:text-primary transition-colors">
                    {post.title}
                  </h2>
                  <p className="text-muted-foreground text-sm mb-4">
                    {post.excerpt}
                  </p>
                  
                  <div className="flex items-center justify-between">
                    <span className="text-xs text-muted-foreground">{post.date}</span>
                    <span className="text-primary text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                      Read More <ArrowRight className="w-4 h-4" />
                    </span>
                  </div>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Newsletter CTA */}
      <section className="py-20 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="max-w-2xl mx-auto text-center p-8 rounded-2xl bg-gradient-to-br from-primary/10 via-primary/5 to-transparent border border-primary/20">
            <h2 className="font-display text-2xl font-bold text-foreground mb-4">
              Stay Updated
            </h2>
            <p className="text-muted-foreground mb-6">
              Get the latest insights delivered to your inbox. No spam, just valuable content.
            </p>
            <div className="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
              <input
                type="email"
                placeholder="your@email.com"
                className="flex-1 h-12 px-4 rounded-lg bg-background border border-border text-foreground focus:outline-none focus:ring-2 focus:ring-ring"
              />
              <Button variant="hero" size="lg">
                Subscribe
              </Button>
            </div>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Blog;
