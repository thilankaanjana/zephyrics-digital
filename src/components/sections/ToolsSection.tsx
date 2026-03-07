const tools = [
  { name: "WordPress", category: "CMS" },
  { name: "React", category: "Frontend" },
  { name: "Figma", category: "Design" },
  { name: "Canva", category: "Graphics" },
  { name: "SEO Tools", category: "Marketing" },
  { name: "Analytics", category: "Data" },
  { name: "Tailwind", category: "Styling" },
  { name: "Node.js", category: "Backend" },
];

const skills = [
  "Web Design",
  "UI/UX",
  "Branding",
  "SEO",
  "Content Creation",
  "Landing Pages",
  "E-commerce",
  "Performance",
];

export function ToolsSection() {
  return (
    <section className="py-24 bg-card relative overflow-hidden">
      <div className="container px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <span className="text-primary text-sm font-semibold uppercase tracking-wider">Our Toolkit</span>
          <h2 className="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-foreground mt-3 mb-4">
            Powered by
            <span className="gradient-text"> Modern Technology</span>
          </h2>
          <p className="text-lg text-muted-foreground">
            We use industry-leading tools and technologies to deliver exceptional results.
          </p>
        </div>

        {/* Tools Grid */}
        <div className="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-16">
          {tools.map((tool) => (
            <div
              key={tool.name}
              className="p-6 rounded-xl bg-background border border-border hover:border-primary/30 transition-all duration-300 text-center group"
            >
              <div className="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                <span className="text-xl font-bold text-primary">{tool.name[0]}</span>
              </div>
              <h3 className="font-semibold text-foreground">{tool.name}</h3>
              <p className="text-xs text-muted-foreground mt-1">{tool.category}</p>
            </div>
          ))}
        </div>

        {/* Skills Tags */}
        <div className="flex flex-wrap justify-center gap-3">
          {skills.map((skill) => (
            <span
              key={skill}
              className="px-5 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium border border-primary/20 hover:bg-primary/20 transition-colors"
            >
              {skill}
            </span>
          ))}
        </div>
      </div>
    </section>
  );
}
