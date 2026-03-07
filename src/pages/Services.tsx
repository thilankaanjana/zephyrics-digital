import { Link } from "react-router-dom";
import { Layout } from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { 
  Globe, 
  Search, 
  Palette, 
  PenTool, 
  Layout as LayoutIcon, 
  Layers,
  ArrowRight,
  Check
} from "lucide-react";

const services = [
  {
    id: "web-design",
    icon: Globe,
    title: "Web Design & Development",
    description: "Custom websites that look stunning and perform flawlessly. Built with modern technology for speed, security, and SEO.",
    forWho: "Businesses needing a professional online presence, from simple portfolios to complex web applications.",
    problem: "Outdated, slow, or unprofessional websites that drive visitors away and hurt your credibility.",
    deliverables: [
      "Custom responsive website design",
      "Mobile-first development",
      "SEO-optimized structure",
      "Fast loading performance",
      "Content management system",
      "Launch support & training",
    ],
  },
  {
    id: "seo",
    icon: Search,
    title: "SEO & Website Optimization",
    description: "Get found on Google by your ideal customers. Data-driven SEO strategies that improve rankings and drive organic traffic.",
    forWho: "Businesses wanting to increase visibility and attract more qualified leads through search engines.",
    problem: "Low search rankings, invisible to potential customers, losing business to competitors who rank higher.",
    deliverables: [
      "SEO audit & strategy",
      "Keyword research",
      "On-page optimization",
      "Technical SEO fixes",
      "Content optimization",
      "Performance tracking",
    ],
  },
  {
    id: "ui-ux",
    icon: Palette,
    title: "UI/UX Design",
    description: "Beautiful, intuitive interfaces that users love. Every element designed with purpose to enhance user experience.",
    forWho: "Apps, platforms, and websites that need better user engagement and conversion rates.",
    problem: "Confusing navigation, poor user experience, and interfaces that frustrate rather than delight users.",
    deliverables: [
      "User research & analysis",
      "Wireframes & prototypes",
      "Visual design system",
      "Interactive mockups",
      "Usability testing",
      "Design handoff",
    ],
  },
  {
    id: "branding",
    icon: PenTool,
    title: "Branding & Graphic Design",
    description: "Memorable brand identities that tell your story. Stand out from competitors with consistent, professional visuals.",
    forWho: "New businesses, rebrands, or anyone needing cohesive visual identity across all touchpoints.",
    problem: "Inconsistent visuals, forgettable brand image, and difficulty standing out in a crowded market.",
    deliverables: [
      "Logo design & variations",
      "Brand style guide",
      "Color palette & typography",
      "Business card & stationery",
      "Social media templates",
      "Brand guidelines document",
    ],
  },
  {
    id: "landing-pages",
    icon: LayoutIcon,
    title: "Landing Pages & Funnels",
    description: "High-converting landing pages designed to capture leads and drive sales. Optimized for maximum conversions.",
    forWho: "Marketing campaigns, product launches, lead generation, and businesses running ads.",
    problem: "Low conversion rates, wasted ad spend, and landing pages that don't turn visitors into customers.",
    deliverables: [
      "Conversion-focused design",
      "Compelling copywriting",
      "A/B testing setup",
      "Lead capture forms",
      "Analytics integration",
      "Speed optimization",
    ],
  },
  {
    id: "content",
    icon: Layers,
    title: "Digital Content & Canva Design",
    description: "Engaging visual content for social media, marketing, and presentations. Professional designs that connect with your audience.",
    forWho: "Businesses needing ongoing visual content for social media, marketing materials, and presentations.",
    problem: "Inconsistent social media presence, unprofessional graphics, and content that doesn't engage.",
    deliverables: [
      "Social media graphics",
      "Marketing materials",
      "Presentation design",
      "Infographics",
      "Email templates",
      "Content calendars",
    ],
  },
];

const Services = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="pt-32 pb-16 bg-background relative overflow-hidden">
        <div className="absolute inset-0 hero-glow" />
        <div className="absolute inset-0 bg-grid-pattern bg-grid opacity-5" />
        
        <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto text-center">
            <span className="text-primary text-sm font-semibold uppercase tracking-wider">Our Services</span>
            <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-foreground mt-4 mb-6">
              Digital Solutions That
              <span className="gradient-text"> Drive Results</span>
            </h1>
            <p className="text-xl text-muted-foreground leading-relaxed">
              Comprehensive digital services tailored to help your business grow. 
              From stunning designs to powerful SEO, we've got you covered.
            </p>
          </div>
        </div>
      </section>

      {/* Services List */}
      <section className="py-20 bg-card">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="space-y-16">
            {services.map((service, index) => (
              <div
                key={service.id}
                id={service.id}
                className={`grid lg:grid-cols-2 gap-12 items-start ${
                  index % 2 === 1 ? "lg:flex-row-reverse" : ""
                }`}
              >
                <div className={index % 2 === 1 ? "lg:order-2" : ""}>
                  <div className="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6">
                    <service.icon className="w-7 h-7 text-primary" />
                  </div>
                  <h2 className="font-display text-3xl font-bold text-foreground mb-4">
                    {service.title}
                  </h2>
                  <p className="text-lg text-muted-foreground mb-6 leading-relaxed">
                    {service.description}
                  </p>
                  
                  <div className="space-y-4 mb-8">
                    <div className="p-4 rounded-xl bg-background border border-border">
                      <h4 className="font-semibold text-foreground mb-2">Who it's for:</h4>
                      <p className="text-sm text-muted-foreground">{service.forWho}</p>
                    </div>
                    <div className="p-4 rounded-xl bg-background border border-border">
                      <h4 className="font-semibold text-foreground mb-2">Problem it solves:</h4>
                      <p className="text-sm text-muted-foreground">{service.problem}</p>
                    </div>
                  </div>

                  <Button variant="hero" size="lg" asChild>
                    <Link to="/contact" className="flex items-center gap-2">
                      Get Started <ArrowRight className="w-4 h-4" />
                    </Link>
                  </Button>
                </div>

                <div className={`p-8 rounded-2xl bg-background border border-border ${index % 2 === 1 ? "lg:order-1" : ""}`}>
                  <h4 className="font-display font-semibold text-foreground mb-6">What you get:</h4>
                  <ul className="space-y-4">
                    {service.deliverables.map((item) => (
                      <li key={item} className="flex items-start gap-3">
                        <div className="w-5 h-5 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                          <Check className="w-3 h-3 text-primary" />
                        </div>
                        <span className="text-muted-foreground">{item}</span>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl mx-auto text-center">
            <h2 className="font-display text-3xl sm:text-4xl font-bold text-foreground mb-4">
              Not sure what you need?
            </h2>
            <p className="text-lg text-muted-foreground mb-8">
              Let's chat! We'll help you figure out the best solution for your business goals.
            </p>
            <Button variant="hero" size="xl" asChild>
              <Link to="/contact" className="flex items-center gap-2">
                Book a Free Consultation <ArrowRight className="w-5 h-5" />
              </Link>
            </Button>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Services;
