import { useState } from "react";
import { Link } from "react-router-dom";
import { Layout } from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { ExternalLink } from "lucide-react";
import { cn } from "@/lib/utils";

const categories = ["All", "Web Design", "Branding", "UI/UX", "SEO"];

const projects = [
  {
    id: 1,
    title: "TechStart Landing Page",
    category: "Web Design",
    description: "Modern SaaS landing page with high conversion focus",
    problem: "Low visitor engagement and poor conversion rates",
    solution: "Redesigned with clear CTAs and trust elements",
    result: "3x increase in demo bookings",
  },
  {
    id: 2,
    title: "GrowthCo Rebrand",
    category: "Branding",
    description: "Complete brand identity for a marketing agency",
    problem: "Outdated brand that didn't reflect company values",
    solution: "Fresh, modern identity with comprehensive guidelines",
    result: "Improved client perception and new business",
  },
  {
    id: 3,
    title: "Innovate App Dashboard",
    category: "UI/UX",
    description: "User-friendly dashboard for data analytics platform",
    problem: "Complex interface causing user frustration",
    solution: "Simplified navigation and intuitive data visualization",
    result: "40% reduction in support tickets",
  },
  {
    id: 4,
    title: "BuildFast SEO Campaign",
    category: "SEO",
    description: "Comprehensive SEO strategy for construction company",
    problem: "Zero organic visibility, relying only on paid ads",
    solution: "Technical SEO fixes and content strategy",
    result: "First page rankings for key terms",
  },
  {
    id: 5,
    title: "ScaleUp E-commerce",
    category: "Web Design",
    description: "Modern e-commerce website with seamless checkout",
    problem: "High cart abandonment, slow website",
    solution: "Rebuilt with focus on speed and UX",
    result: "25% increase in completed purchases",
  },
  {
    id: 6,
    title: "Wellness Brand Identity",
    category: "Branding",
    description: "Calming brand identity for wellness startup",
    problem: "No brand presence, generic visuals",
    solution: "Cohesive brand system with soothing aesthetics",
    result: "Strong brand recognition in niche market",
  },
];

const Portfolio = () => {
  const [activeCategory, setActiveCategory] = useState("All");

  const filteredProjects = activeCategory === "All"
    ? projects
    : projects.filter((p) => p.category === activeCategory);

  return (
    <Layout>
      {/* Hero Section */}
      <section className="pt-32 pb-16 bg-background relative overflow-hidden">
        <div className="absolute inset-0 hero-glow" />
        <div className="absolute inset-0 bg-grid-pattern bg-grid opacity-5" />
        
        <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto text-center">
            <span className="text-primary text-sm font-semibold uppercase tracking-wider">Our Work</span>
            <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-foreground mt-4 mb-6">
              Projects That
              <span className="gradient-text"> Deliver Results</span>
            </h1>
            <p className="text-xl text-muted-foreground leading-relaxed">
              Real projects, real solutions, real impact. See how we help businesses grow.
            </p>
          </div>
        </div>
      </section>

      {/* Filter */}
      <section className="py-8 bg-card border-y border-border">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="flex flex-wrap justify-center gap-2">
            {categories.map((category) => (
              <button
                key={category}
                onClick={() => setActiveCategory(category)}
                className={cn(
                  "px-5 py-2 rounded-full text-sm font-medium transition-all duration-200",
                  activeCategory === category
                    ? "bg-primary text-primary-foreground"
                    : "bg-muted text-muted-foreground hover:bg-muted/80"
                )}
              >
                {category}
              </button>
            ))}
          </div>
        </div>
      </section>

      {/* Projects Grid */}
      <section className="py-20 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {filteredProjects.map((project) => (
              <div
                key={project.id}
                className="group rounded-2xl bg-card border border-border hover:border-primary/30 overflow-hidden transition-all duration-300"
              >
                {/* Project Image Placeholder */}
                <div className="aspect-video bg-gradient-to-br from-primary/20 via-primary/10 to-transparent flex items-center justify-center">
                  <span className="text-4xl font-display font-bold text-primary/30">
                    {project.title[0]}
                  </span>
                </div>
                
                <div className="p-6">
                  <span className="text-xs font-medium text-primary bg-primary/10 px-2 py-1 rounded-full">
                    {project.category}
                  </span>
                  <h3 className="font-display text-xl font-semibold text-foreground mt-3 mb-2">
                    {project.title}
                  </h3>
                  <p className="text-muted-foreground text-sm mb-4">
                    {project.description}
                  </p>
                  
                  <div className="space-y-2 text-sm">
                    <div className="flex gap-2">
                      <span className="text-primary font-medium">Problem:</span>
                      <span className="text-muted-foreground">{project.problem}</span>
                    </div>
                    <div className="flex gap-2">
                      <span className="text-primary font-medium">Result:</span>
                      <span className="text-muted-foreground">{project.result}</span>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="py-20 bg-card">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl mx-auto text-center">
            <h2 className="font-display text-3xl sm:text-4xl font-bold text-foreground mb-4">
              Ready to be our next success story?
            </h2>
            <p className="text-lg text-muted-foreground mb-8">
              Let's create something amazing together.
            </p>
            <Button variant="hero" size="xl" asChild>
              <Link to="/contact" className="flex items-center gap-2">
                Start Your Project <ExternalLink className="w-5 h-5" />
              </Link>
            </Button>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Portfolio;
