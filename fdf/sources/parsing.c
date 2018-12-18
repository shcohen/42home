/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   parsing.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:18 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/18 14:02:39 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

static int	ft_count(char *str, char c)
{
	int		i;
	int		nb;

	i = 0;
	nb = 0;
	while (str[i])
	{
		while (str[i] == c)
			i++;
		if (str[i])
			nb++;
		while (str[i] && str[i] != ' ')
			i++;
	}
	return (nb);
}

int			*ft_intsplit(char *str, char c)
{
	int		*tab;
	int		i;
	int		j;

	if (!(tab = (int *)malloc(sizeof(int) * ft_count(str, c))))
		return (NULL);
	i = 0;
	j = 0;
	while (str[i])
	{
		while (str[i] == c)
			i++;
		if (str[i])
		{
			tab[j++] = ft_atoi(str + i);
			while (str[i] && str[i] != ' ')
				i++;
		}
	}
	return (tab);
}

int			ft_check(char *line)
{
	int		i;

	i = 0;
	while (line[i])
	{
		if (!ft_isdigit(line[i]) && !ft_isalpha(line[i])
			&& line[i] != ' ' && line[i] != '-' && line[i] != ',')
			return (0);
		i++;
	}
	return (1);
}

t_all		*ft_parse_map(char *file, t_all *all)
{
	char	*line;
	int		fd1;
	int		fd2;
	int		i;

	if ((fd1 = open(file, O_RDONLY)) < 0)
		return (NULL);
	all->map.height = 0;
	while (get_next_line(fd1, &line) > 0)
	{
		all->map.height++;
		free(line);
	}
	if (!(all->map.tab = (int **)ft_memalloc(sizeof(int *)
		* (all->map.height + 1))))
		return (NULL);
	close(fd1);
	ft_parse_map(line, all);
	if ((fd2 = open(file, O_RDONLY)) < 0)
		return (NULL);
	i = 0;
	while (get_next_line(fd2, &line) > 0)
	{
		if (!ft_check(line))
			return (NULL);
		all->map.tab[i] = ft_intsplit(line, ' ');
		all->map.width = ft_count(line, ' ');
		free(line);
		i++;
	}
	all->map.tab[i] = NULL;
	close(fd2);
	return (all);
}